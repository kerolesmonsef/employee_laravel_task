<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Illuminate\Database\Eloquent\Builder;

class OrderBy extends IFilter
{
    private string $direction;

    public function __construct(string $column, $ask_check, string $direction = "asc")
    {
        parent::__construct($column, $ask_check);
        $this->direction = $direction;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        return $builder->orderBy($this->column,$this->direction);
    }
}
