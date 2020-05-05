<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'tbl_setting';
    protected $connection = 'mysql';
    protected $primaryKey = 'setting_id';
    public $timestamps = false;
    protected $fillable = array('title_admin','facebook_link','twitter_link','email_link');
}
