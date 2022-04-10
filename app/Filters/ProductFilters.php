<?php

namespace App\Filters;

class ProductFilters extends QueryFilter
{
	/**
	 * Filtering with given name
	 *
	 * @param  string  $name
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function name($name)
	{
        return $this->builder->whereNameLike($name);
	}

    /**
	 * Filtering with given category id
	 *
	 * @param  string  $category_id
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function category_id($category_id)
	{
        return $this->builder->whereCategoryId($category_id);
	}

    /**
	 * Filtering with given category name
	 *
	 * @param  string  $category_name
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function category_name($category_name)
	{
        return $this->builder->whereCategoryNameLike($category_name);
	}

    /**
	 * Filtering with given price from value
	 *
	 * @param  string  $price_from
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function price_from($price_from)
	{
		return $this->builder->wherePriceFrom($price_from);
	}

    /**
	 * Filtering with given price to value
	 *
	 * @param  int  $price_to
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function price_to($price_to)
	{
        return $this->builder->wherePriceTo($price_to);
	}

    /**
	 * Filtering with given published value
	 *
	 * @param  string  $published
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function published($published)
	{
        if($published === 'true'){
            return $this->builder->published();
        }
        return $this->builder->notPublished();
	}
}
