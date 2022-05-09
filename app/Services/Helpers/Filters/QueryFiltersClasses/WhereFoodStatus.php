<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;

class WhereFoodStatus extends IFilter
{

    private ?string $value;

    public function __construct($ask_check, string $value = null)
    {
        parent::__construct('', $ask_check);
        $this->value = $value ?? $ask_check;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applyFilter($builder)
    {
        if ($this->value == "pending_changes") {
            return $builder->whereNotNull("food.json_update");
        }elseif ($this->value == "new_foods"){
            return $builder->whereNull("food.reviewed_by_admin_at");
        }

        return $builder;
    }
}
