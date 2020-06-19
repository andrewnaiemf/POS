<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
    protected $fillable=['title','link','description'];

    public $timestamps=false;

    public function customers(){
      return  $this->belongsToMany('App\Customer','customer_service','service_id','customer_id','id','id');
    }
}
