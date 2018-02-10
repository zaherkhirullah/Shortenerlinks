<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Domain;
use App\Http\Models\Adstype;
use App\Http\Models\folder;
use App\User;

class link extends Model
{
  protected $table = 'links';
     protected $fillable = 
     [
      'user_id','domain_id','ad_id','folder_id','slug','clicks',
      'status','url','shorted_url','alias','isDeleted',
     ];
 /*
    |------------------------
    |  private Functions
    |------------------------
    */
    public function deleteForm()
    {
        return array ('route' =>'links.destroy','method'=>'delete',
                               'class'=>'form-delete','id'=>'form-delete' );
    }
    protected function editForm()
    {
        return array ('route' =>'links.update','method'=>'Post',
                      'class'=>'form-edit','id'=>'form-edit' );
    }
    /*
    |------------------------
    |  Public Functions
    |------------------------
    */
 
    /* list All Links  */      
      public function links()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    /* list of  Links has been deleted and list (Desc) by create date */
      public function deletedLinks()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
    /* list all Links for a user */
      public function UserLinks(User $user)
      {
       return $this->User()->find()
        ->where(['status' =>1, 'id' =>$user->id])->first();
      }
      public function domain()
      {
        return $this->belongsTo(Domain::class); 
      }
       public function user()
      {
        return $this->belongsTo(User::class); 
      }
         public function folder()
      {
        return $this->belongsTo(folder::class); 
      }
      public function adstype()
      {
        return $this->belongsTo(Adstype::class); 
      }

      public function striposArray($haystack, $needle, $offset = 0)
      {
          if (!is_array($needle)) {
              $needle = [$needle];
          }
          foreach ($needle as $query) {
              if (stripos($haystack, $query, $offset) !== false) {
                  return true; /*  stop on first true result */
              }
          }
          return false;
      }

      public function isOwnedBy($alias, $user_id)
      {
          return $this->exists(['alias' =>$alias, 'user_id' =>$user_id]);
      }

      public function geturl()
      {
          do {
              $min = get_option('alias_min_length', 4);
              $max = get_option('alias_max_length', 8);

              $numAlpha = rand($min, $max);
              $out = $this->generateurl($numAlpha);
              while ($this->checkReservedAuto($out)) {
                  $out = $this->generateurl($numAlpha);
              }
              $alias_count = $this->find('all')
                  ->where(['alias' =>$out])
                  ->count();
          } while ($alias_count > 0);
          return $out;
      }

      /* http:/* blog.justni.com/creating-a-short-url-service-using-php-and-mysql/   */
      public function generateurl($numAlpha)
      {
          $listAlpha = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $generateurl = '';
          $i = 0;
          while ($i < $numAlpha) {
              $random = mt_rand(0, strlen($listAlpha) - 1);
              $generateurl .= $listAlpha{$random};
              $i = $i + 1;
          }
          return $generateurl;
      }

      public function getLinkMeta($long_url)
      {
          $linkMeta = [
              'title' =>'',
              'description' =>'',
              'image' =>''
          ];

          if (parse_url($long_url, PHP_URL_SCHEME) == 'magnet') {
              return $linkMeta;
          }

          $headers = get_http_headers($long_url);

          if (isset($headers['content-type']) && stripos($headers['content-type'], 'text/html') === false) {
              return $linkMeta;
          }

        $content = curlHtmlHeadRequest($long_url);

          if (!empty($content)) {
              $doc = new \DOMDocument();
              /*  UTF-8 Encoding Fix  */
              /*  http:/* www.php.net/manual/en/domdocument.loadhtml.php#95251 */
              @$doc->loadHTML('<?xml encoding="UTF-8">' . $content);
              $nodes = $doc->getElementsByTagName('title');


              if (!empty($nodes->item(0)->nodeValue)) {
                  $title = $nodes->item(0)->nodeValue;
                  $linkMeta['title'] = $this->cleanMeta($title);
              }

              $metas = $doc->getElementsByTagName('meta');

              for ($i = 0; $i < $metas->length; $i++) {
                  $meta = $metas->item($i);

                  if (empty($linkMeta['description']) && $meta->getAttribute('name') == 'description') {
                      $description = $meta->getAttribute('content');
                      $linkMeta['description'] = $this->cleanMeta($description);
                  }

                  if (empty($linkMeta['image']) && $meta->getAttribute('property') == 'og:image') {
                      $linkMeta['image'] = $meta->getAttribute('content');
                  }
              }
          }

          return $linkMeta;
      }

      public function cleanMeta($meta)
      {
          return preg_replace("/\r|\n/", "", strip_tags($meta));
      }

      public function checkReservedAuto($keyword)
      {
          /* $reserved_aliases = explode( ',', Configure::read( 'Option.reserved_aliases' ) ); */ 
          $reserved_aliases = [];
          if (in_array($keyword, $reserved_aliases)) {
              return true;
          }
          return false;
      }
  }
