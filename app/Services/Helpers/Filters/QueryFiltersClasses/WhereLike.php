<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Illuminate\Database\Query\Builder;

class WhereLike extends IFilter
{

    private ?string $value;
    private string $boolean;


    public function __construct(string $column, $ask_check, ?string $value = null, string $boolean = "AND")
    {
        parent::__construct($column, $ask_check);
        $this->value = $value ?? $ask_check;
        $this->boolean = $boolean;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        $like = $this->value;
        return $builder->where($this->column, 'LIKE', "%$like%", $this->boolean);
    }
}
