<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class WhereDateBetween extends IFilter
{
    private $from_date;
    private $to_date;

    public function __construct(string $column, $ask_check, $from_date, $to_date)
    {
        parent::__construct($column, $ask_check);
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function applyFilter($builder)
    {
        return $builder->whereBetween(DB::raw("DATE({$this->column})"), [$this->from_date, $this->to_date]);
    }
}
