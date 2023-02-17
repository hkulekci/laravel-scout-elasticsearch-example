<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'price', 'discounted_price', 'description'];

    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function toSearchableArray(): array
    {
        $array = $this->toArray();
        $array['attributes'] = $this->attributes()->with('attribute')->get()->toArray();

        return $array;
    }
}
