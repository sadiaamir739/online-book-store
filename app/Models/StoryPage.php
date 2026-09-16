<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryPage extends Model
{
    protected $fillable = [
        'story_id',
        'page_number',
        'title',
        'content',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}