<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'language',
        'description',
        'price',
        'cover_image',
        'category_id',
        'published',
    ];

    protected function casts(): array
    {
        return [
            'published' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function pages(): HasMany
    {
        return $this->hasMany(BookPage::class)
                    ->orderBy('page_number');
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class)
                    ->orderBy('chapter_number');
    }
}