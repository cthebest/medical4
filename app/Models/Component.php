<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'route'
    ];

    public function component_options(): HasMany
    {
        return $this->hasMany(ComponentOption::class);
    }

    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
