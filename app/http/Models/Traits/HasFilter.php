<?php

namespace App\Models\Traits;

use App\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function filteres(AbstractFilter $filter, Builder $builder)
    {
        $filter->applyFilters($builder);
        return $builder;
    }
}
