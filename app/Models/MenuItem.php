<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'path',
        'icon',
        'order',
        'resource_id',
    ];

    public function component_option(): BelongsTo
    {
        return $this->belongsTo(ComponentOption::class);
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }
}
