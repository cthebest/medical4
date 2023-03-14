<?php

namespace App\Models;

use App\Services\Interfaces\ComponentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model implements ComponentType
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'image',
        'status',
        'description',
        'user_id',
        'category_id',
        'body'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getComponent(): string
    {
        return "articles";
    }
}
