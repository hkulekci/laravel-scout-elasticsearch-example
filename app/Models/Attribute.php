<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Attribute extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'attribute_group_id'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(AttributeGroup::class);
    }
}
