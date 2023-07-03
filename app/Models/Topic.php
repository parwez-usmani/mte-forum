<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = [
        'topic_name',
        'topic_title',
        'topic_description',
        'image',
        'topic_type',
        'comment_id',
        'comment_description',
        'category_id'
    ];
}
