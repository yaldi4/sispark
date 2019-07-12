<?php
/**
 * Created by PhpStorm.
 * User: galih
 * Date: 3/16/2015
 * Time: 2:18 PM
 */

class Notif extends \Eloquent {

    protected $table = 'notif';

    public $timestamps = false ;

    protected  $guarded = ['id','created_at'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

}