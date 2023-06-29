<?php

namespace App\Http\Models\Traits;
use app\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilters(Builder $builder, AbstractFilter $filter)
    {
        $filter->applyFilters($builder);
        return $builder;
    }
}
