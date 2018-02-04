<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Validator;

class LinkValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
         'user_id'=>  'required|integer';
         'domain_id'=>  'required|integer';
         'ad_id'=>  'required|integer';
         'status'=>  'required|string';
         'url'=>  'required|url|string';
         'alias'=>  'required|unique:links|max:30|string';
         'title'=>  'string|checkBannedWords|';
         'description'=>  'string|checkBannedWords';

        ];
    }
     public function messages()
    {
        return [
             'url.required' => 'Please add a URL.',
             'alias.required' => 'Please add an alias.',
             'alias.max' => 'Maximum alias length is 30 characters.',
        ];
    }
    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
          }

           $validator
            ->add('url', 'checkProtocol', [
                'rule' => function ($value, $context) {
                    $scheme = parse_url($value, PHP_URL_SCHEME);

                    if (in_array($scheme, ['http', 'https', 'magnet'])) {
                        return true;
                    }
                    return false;
                },
                'last' => true,
                'message' => __('http, https and magnet urls only allowed.')
            ])
            ->add('url', 'disallowedDomains', [
                'rule' => function ($value, $context) {
                    $disallowed_domains = explode(',', get_option('disallowed_domains'));
                    $disallowed_domains = array_map('trim', $disallowed_domains);
                    $disallowed_domains = array_filter($disallowed_domains);
                    $disallowed_domains = array_merge($disallowed_domains, array_values(get_all_domains_list()));

                    if (empty($disallowed_domains)) {
                        return true;
                    }

                    $url_main_domain = parse_url($value, PHP_URL_HOST);

                    if (in_array(strtolower($url_main_domain), $disallowed_domains)) {
                        return false;
                    }
                    return true;
                },
                'last' => true,
                'message' => __('This domain is not allowed on our system.')
            ])
            ->add('url', 'checkGoogleSafeUrl', [
                'rule' => function ($value, $context) {
                    $google_safe_browsing_key = get_option('google_safe_browsing_key');

                    if (empty($google_safe_browsing_key)) {
                        return true;
                    }

                    // https://developers.google.com/safe-browsing/v4/reference/rest/v4/ClientInfo
                    $url = "https://safebrowsing.googleapis.com/v4/threatMatches:find?key={$google_safe_browsing_key}";
                    $method = 'POST';
                    $data = '{
                        "client": {
                          "clientId":      "yourcompanyname",
                          "clientVersion": "1.5.2"
                        },
                        "threatInfo": {
                          "threatTypes":      ["MALWARE", "SOCIAL_ENGINEERING", "POTENTIALLY_HARMFUL_APPLICATION", ' .
                        '"UNWANTED_SOFTWARE", "MALICIOUS_BINARY"],
                          "platformTypes":    ["ANY_PLATFORM"],
                          "threatEntryTypes": ["URL"],
                          "threatEntries": [
                            {"url": "' . $value . '"},
                          ]
                        }
                      }';

                    $headers = ['Content-Type: application/json'];

                    $options = [
                        CURLOPT_CONNECTTIMEOUT => 15,
                        CURLOPT_TIMEOUT => 15
                    ];

                    $result = @json_decode(curlRequest($url, $method, $data, $headers, $options)->body, true);

                    if (isset($result['matches'])) {
                        return false;
                    }
                    return true;
                },
                'last' => true,
                'message' => __("Google currently report this URL as an active phishing, malware, or unwanted website.")
            ])
            ->add('url', 'checkPhishtankSafeUrl', [
                'rule' => function ($value, $context) {
                    $phishtank_key = get_option('phishtank_key');

                    if (empty($phishtank_key)) {
                        return true;
                    }

                    // https://www.phishtank.com/api_info.php

                    $url = 'http://checkurl.phishtank.com/checkurl/';
                    $method = 'POST';
                    $data = [
                        'url' => $value,
                        'format' => 'json',
                        'app_key' => $phishtank_key
                    ];

                    $options = [
                        CURLOPT_CONNECTTIMEOUT => 15,
                        CURLOPT_TIMEOUT => 15
                    ];

                    $result = @json_decode(curlRequest($url, $method, $data, [], $options)->body, true);

                    if (isset($result['results']['in_database']) && $result['results']['in_database'] === true) {
                        return false;
                    }

                    return true;
                },
                'last' => true,
                'message' => __("PhishTank currently report this URL as an active phishing website.")
            ])
            ->requirePresence('alias', 'create')
            ->add('alias', 'alphaNumericDashUnderscore', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('|^[0-9a-zA-Z]*$|', $value);
                },
                'last' => true,
                'message' => __('Alias should be a alpha numeric value')
            ])
            ->add('alias', 'checkReserved', [
                'rule' => function ($value, $context) {
                    $reserved_aliases = explode(',', get_option('reserved_aliases'));
                    $reserved_aliases = array_map('trim', $reserved_aliases);
                    $reserved_aliases = array_filter($reserved_aliases);

                    if (empty($reserved_aliases)) {
                        return true;
                    }

                    if (in_array(strtolower($value), $reserved_aliases)) {
                        return false;
                    }
                    return true;
                },
                'last' => true,
                'message' => __('This alias is a reserved word.')
            ])
            ->add('title', 'checkBannedWords', [
                'rule' => function ($value, $context) {
                    $banned_words = explode(',', get_option('links_banned_words'));
                    $banned_words = array_map('trim', $banned_words);
                    $banned_words = array_filter($banned_words);

                    if (empty($banned_words)) {
                        return true;
                    }

                    if ($this->striposArray($value, $banned_words) !== false) {
                        return false;
                    }
                    return true;
                },
                'last' => false,
                'message' => __("This link contains banned words.")
            ])
            ->add('description', 'checkBannedWords', [
                'rule' => function ($value, $context) {
                    $banned_words = explode(',', get_option('links_banned_words'));
                    $banned_words = array_map('trim', $banned_words);
                    $banned_words = array_filter($banned_words);

                    if (empty($banned_words)) {
                        return true;
                    }

                    if ($this->striposArray($value, $banned_words) !== false) {
                        return false;
                    }
                    return true;
                },
                'last' => true,
                'message' => __("This link contains banned words.")
            ])
            ->add('ad_type', 'inList', [
                'rule' => ['inList', [0, 1, 2]],
                'last' => true,
                'message' => __('Choose a valid value.')
            ]);
          
        });
    }
}
