<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComponentOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filter',
        'livewire_field',
        'component_id',
        'route'
    ];

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }


    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
