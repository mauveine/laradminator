<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Proposal extends Model {
    use SoftDeletes;

    protected $table = 'user_proposals';

    protected $fillable = [
        'title', 'description', 'user_id'
    ];

    public static function boot () {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string)Uuid::generate(4);
        });
    }
}
