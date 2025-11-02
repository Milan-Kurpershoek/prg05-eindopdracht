<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    public function genre (): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'description',
        'pages',
        'genre_id',
        'image',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function review(): HasMany
    {
        return $this->hasMany(Review::class, 'book_id');
    }

}
