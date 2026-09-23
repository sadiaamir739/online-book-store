<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'title',
        'author',
        'category_id',
        'language',
        'cover_image',
        'description',
        'published',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'published' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pages()
    {
        return $this->hasMany(StoryPage::class)
                    ->orderBy('page_number');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}