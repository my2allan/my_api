<?php

namespace App\Filters\v1;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use App\Filters\ApiFilter;

class InvoiceFilters extends ApiFilter{

    // $table->integer('customer_id');
    // $table->integer('amount');
    // $table->string('status'); //Billed, Paid, Void
    // $table->dateTime('billed_date');
    // $table->dateTime('paid_date')->nullable();

    protected $safeParams = [

        'customer_id' =>['eq'],
        'amount'=>['eq','lt','lte','gte','gt'],
        'status'=>['eq','ne'],
        'billed_date'=>['eq'],
        'paid_date'=>['eq'],
        
    ];

    protected $columMap=[
        'customer_id'=>'customer_id',
        'billed_date'=>'billed_date',
        'paid_date'=>'paid_date'
    ];

    protected $operatorMap = [

        'eq'=>'=',
        'lt'=>'<',
        'lte'=>'<=',
        'gt'=>'>',
        'gte'=>'>=',
        'ne'=>'!='

    ];

 
}