<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon ;

class linkVisitor extends Model
{
  protected $table = 'link_visitors';    
     protected $fillable =   ['ip_visitor','link_id','country',  ];
    
    public function AllVisits(){
      return $this->all();
    }
    public function TodayVisits($link_id){
      return $this->where([
        ['link_id',$link_id],
        ['created_at',">",Today()],
        ['created_at',"<",Carbon::today()->addDay(1)]
        ]);
    }
    public function TodayVisitsByIp($ip,$link_id){
      return $this->TodayVisits($link_id)->where([['ip',$ip],]);
    }

}
