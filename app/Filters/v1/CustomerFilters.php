<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use App\Filters\ApiFilter;

class CustomerFilters extends ApiFilter{

    protected $safeParams = [
        'id' =>['eq'],
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'postalCode'=>['eq','gt','lt']
    ];

    protected $columMap=[
        'postalCode'=>'postal_code'
    ];

    protected $operatorMap = [

        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',

    ];

}