<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $primarykey='id';

    protected $fillable=['title','description','status','phone','start_date','end_date'];
    public $timestamps=false;


    public function services(){
        return $this->belongsToMany('App\Service','customer_service','customer_id','service_id','id','id');
    }
}
