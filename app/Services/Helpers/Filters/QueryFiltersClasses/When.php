<?php


namespace App\Services\Helpers\Filters\QueryFiltersClasses;


use App\Services\Helpers\Filters\IFilter;
use Closure;

class When extends IFilter
{

    private Closure $closure;

    public function __construct($ask_check, Closure $closure)
    {
        parent::__construct('', $ask_check);
        $this->closure = $closure;
    }

    public function applyFilter($builder)
    {
        $closure = $this->closure;
        $closure();

        return $builder;
    }
}
