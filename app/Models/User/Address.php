<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Address extends Model {
    use SoftDeletes;

    protected $table = 'user_addresses';

    public function user () {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     *  Setup model event hooks
     */
    public static function boot () {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }
}
