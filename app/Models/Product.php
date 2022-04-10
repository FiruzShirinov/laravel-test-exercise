<?php

namespace App\Models;

use App\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, FilterableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'published_at'
    ];

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Scope a query to only include products with similar name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return void
     */
    public function scopeWhereNameLike($query, $name)
    {
        $query->where('name', 'like', "%$name%");
    }

    /**
     * Scope a query to only include products with matched category id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $category_id
     * @return void
     */
    public function scopeWhereCategoryId($query, $category_id)
    {
        $query->whereHas('categories', function($categories) use($category_id){
            $categories->where('id', $category_id);
        });
    }

    /**
     * Scope a query to only include products with similar category name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $category_name
     * @return void
     */
    public function scopeWhereCategoryNameLike($query, $category_name)
    {
        $query->whereHas('categories', function($categories) use($category_name){
            $categories->where('name', 'like', "%$category_name%");
        });
    }

    /**
     * Scope a query to only include products with matched price from range.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $price_from
     * @return void
     */
    public function scopeWherePriceFrom($query, $price_from)
    {
        $query->where('price', '>=', $price_from);
    }

    /**
     * Scope a query to only include products with matched price to range.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $price_to
     * @return void
     */
    public function scopeWherePriceTo($query, $price_to)
    {
        $query->where('price', '<=', $price_to);
    }

    /**
     * Scope a query to only include published products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at');
    }

    /**
     * Scope a query to only include not published products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeNotPublished($query)
    {
        $query->whereNull('published_at');
    }
}
