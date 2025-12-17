<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Config;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'image',
        'url',
        'category_id',
        'description',
    ];

    protected $appends = ['external_url'];

    /**
     * Get the full product URL.
     *
     * @return string
     */
    public function getExternalUrlAttribute()
    {
        if (str_starts_with($this->product_url, 'http')) {
            return $this->product_url;
        }

        return Config::get('shoptok.base_url') . $this->product_url;
    }

    /**
     * Relationship with the category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
