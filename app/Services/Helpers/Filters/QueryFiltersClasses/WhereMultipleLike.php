<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Illuminate\Database\Query\Builder;

class WhereMultipleLike extends IFilter
{

    private ?string $value;
    private string $boolean;


    public function __construct(array $columns, $ask_check, ?string $value = null, string $boolean = "AND")
    {
        parent::__construct($columns, $ask_check);
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

        return $builder->where(function ($q) use ($like) {
            foreach ($this->column as $column) {
                $q->orWhere($column, 'LIKE', "%$like%", $this->boolean);
            }
        });

    }
}
