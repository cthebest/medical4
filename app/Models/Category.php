<?php

namespace App\Models;

use App\Services\Interfaces\ComponentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model implements ComponentType
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'description'
    ];

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getComponent(): string
    {
        return 'articles';
    }
}
