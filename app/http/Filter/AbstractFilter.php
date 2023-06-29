<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    private array $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function applyFilters(Builder $builder){
        foreach ($this->getCallbacks() as $key => $callback){
            if(isset($this->params[$key])){
                $this->$callback($builder, $this->params[$key]);
            }
        }
    }

    abstract public function getCallbacks(): array;

}
