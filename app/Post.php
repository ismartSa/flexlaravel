<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected  $fillable = ['user_id', 'subject', 'post_massage' ];

    use SoftDeletes;
}
