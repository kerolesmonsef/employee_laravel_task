<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use Illuminate\Database\Query\Builder;

class WhereLangTitleLike extends Where
{
    public function __construct(string $column, $ask_check, string $operation = '=', $value_or_closure = null, string $boolean = "AND")
    {
        parent::__construct($column, $ask_check, $operation, $value_or_closure, $boolean);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder|void
     */
    public function applyFilter($builder)
    {
        $builder->where(function ( $query) {
            $query
                ->whereRaw("JSON_SEARCH(`$this->column`, 'all', '%$this->value_or_closure%', NULL, '$.ar') IS NOT NULL")
                ->orWhereRaw("JSON_SEARCH(`$this->column`, 'all', '%$this->value_or_closure%', NULL, '$.en') IS NOT NULL");
        });

    }

}
