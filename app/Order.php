<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_order'; 
    protected $primaryKey = 'order_id'; 
    public $timestamps = false;

    public function peminjaman(){
   	return $this->belongsTo('App\Peminjaman','id_peminjaman');
    }
    public function inventaris(){
    	return $this->belongsTo('App\Inventaris','id_inventaris');
    }
}
