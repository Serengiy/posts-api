<?php
namespace App\Filter;
use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    const TITLE = 'title';
    const AUTHOR = 'author';
    const DATE_FROM = 'date_from';
    const DATE_TO = 'date_to';

    public function getCallbacks():array
    {
        return [
          self::TITLE => 'title',
          self::AUTHOR => 'author',
          self::DATE_FROM => 'date_from',
          self::DATE_TO => 'date_to',
        ];
    }


    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('author', 'like', "%{$value}%");
    }

    public function date_from(Builder $builder, $value)
    {
        $builder->where('updated_at', '>', $value);
    }

    public function date_to(Builder $builder, $value)
    {
        $builder->where('updated_at', '<', $value);
    }
}
