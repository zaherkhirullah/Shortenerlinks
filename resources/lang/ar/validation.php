<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute يجب قبول .',
    'active_url'           => ':attribute ليست عنوان رابط صالح.',
    'after'                => ':attribute يجب أن تكون  بعد التاريخ  :date.',
    'after_or_equal'       => ':attribute يجب أن يكون  تاريخا بعد أو يساوي :date.',
    'alpha'                => ':attribute قد تحتوي  على أحرف فقط.',
    'alpha_dash'           => ':attribute قد تحتوي  فقط على أحرف وأرقام وشرطات.',
    'alpha_num'            => ':attribute قد تحتوي  على أحرف وأرقام فقط.',
    'array'                => ':attribute يجب أن تكون  مصفوفة.',
    'before'               => ':attribute يجب أن تكون  تاريخ قبل :date.',
    'before_or_equal'      => ':attribute يجب أن يكون سمة تاريخ قبل أو يساوي :date.',
    'between'              => [
        'numeric' => ' :attribute يجب أن تكون  بين :min و :max.',
        'file'    => ' :attribute يجب أن تكون  بين :min و :max كيلوبايت.',
        'string'  => ' :attribute يجب أن تكون  بين :min و :max characters.',
        'array'   => ' :attribute  يجب أن يكون بين :min و :max عناصر.',
    ],
    'boolean'              => ' :attribute يجب أن يكون حقل  صحيحا أو خطأ.',
    'confirmed'            => ' :attribute يتطابق تأكيد .',
    'date'                 => ' :attribute ليست تاريخا صالحا.',
    'date_format'          => ' :attribute لا تتطابق مع تنسيق :format .',
    'different'            => ' :attribute و :other يجب أن تكون مختلفة .',
    'digits'               => ' :attribute يجب أن تكون :digits digits.',
    'digits_between'       => ' :attribute يجب أن تكون بين :min و :max digits.',
    'dimensions'           => ' :attribute أبعاد الصورة غير صالحة.',
    'distinct'             => ' :attribute field has a duplicate value.',
    'email'                => ' :attribute يجب أن يكون عنوان بريدي صالح.',
    'exists'               => ' المحدد :attribute غير صالح.',
    'file'                 => ' :attribute must يحب أن يكون ملف.',
    'filled'               => ' :attribute يجب أن يحوي الحقل على قيمة.',
    'image'                => ' :attribute يجب أن يكون صورة .',
    'in'                   => ' المحدد :attribute غير صالح.',
    'in_array'             => ' :attribute الحقل غير موجود في :other.',
    'integer'              => ' :attribute يجب أن يكون عددا.',
    'ip'                   => ' :attribute يجب أن يكون عنوان IP صالحا.',
    'ipv4'                 => ' :attribute يجب أن يكون عنوان IPv4 صالحا.',
    'ipv6'                 => ' :attribute يجب أن يكون عنوان IPv6 صالحا.',
    'json'                 => ' :attribute يجب أن يكون عنوان JSON صالحا.',
    'max'                  => [
        'numeric' => ' :attribute يجب ألا يكون أكبر من  :max.',
        'file'    => ' :attribute يجب ألا يكون أكبر من  :max كيلوبايت.',
        'string'  => ' :attribute يجب ألا يكون أكبر من  :max حرف.',
        'array'   => ' :attribute  يجب ألا يكون أكبر من :max عناصر.',
    ],
    'mimes'                => ' :attribute يجب أن يكون ملف من نوع type: :values.',
    'mimetypes'            => ' :attribute يجب أن يكون ملف من نوع type: :values.',
    'min'                  => [
        'numeric' => ' :attribute يجب أن يكون على الأقل :min.',
        'file'    => ' :attribute يجب أن يكون على الأقل :min kilobytes.',
        'string'  => ' :attribute يجب أن يكون على الأقل :min characters.',
        'array'   => ' :attribute must have at least :min items.',
    ],
    'not_in'               => ' المحدد :attribute غير صالح .',
    'numeric'              => ' :attribute يجب أن يكون رقما.',
    'present'              => ' :attribute يجب أن يكون الحقل موجودا.',
    'regex'                => ' :attribute التنسيق غير صالح.',
    'required'             => ' :attribute الحقل مطلوب.',
    'required_if'          => ' :attribute حقل مطلوب عندما :other يساوي :value.',
    'required_unless'      => ' :attribute حقل مطلوب ما لم :other داخل :values.',
    'required_with'        => ' :attribute حقل مطلوب عندما :values موجودة.',
    'required_with_all'    => ' :attribute حقل مطلوب عندما :values is present.',
    'required_without'     => ' :attribute حقل مطلوب عندما :values is not present.',
    'required_without_all' => ' :attribute حقل مطلوب عندما لا يوجد شيء  :values .',
    'same'                 => ' :attribute و :other يجب أن تتطابق.',
    'size'                 => [
        'numeric' => ' :attribute يجب أن :size.',
        'file'    => ' :attribute يجب أن :size كيلوبايت.',
        'string'  => ' :attribute يجب أن :size حرف.',
        'array'   => ' :attribute يجب أن تحتوي :size عناصر.',
    ],
    'string'               => ' :attribute يجب أن تكون حروف .',
    'timezone'             => ' :attribute يجب أن تكون منطقة صالحة.',
    'unique'               => ' :attribute إنه مأخوذ مسبقاً.',
    'uploaded'             => ' :attribute لقد أخفق التحميل.',
    'url'                  => ' :attribute التنسيق غير صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
