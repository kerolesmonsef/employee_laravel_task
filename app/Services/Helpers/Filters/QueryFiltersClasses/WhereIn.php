<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Illuminate\Database\Eloquent\Builder;

class WhereIn extends IFilter
{
    private ?array $values = [];
    private string $boolean;

    public function __construct(string $column, $ask_check, array $values = null, string $boolean = "AND")
    {
        parent::__construct($column, $ask_check);
        $this->values = $values ?? $ask_check;
        $this->boolean = $boolean;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        return $builder->whereIn($this->column, $this->values, $this->boolean);
    }
}
