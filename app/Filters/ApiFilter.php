<?php

namespace App\Filters;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;

class ApiFilter{

    protected $safeParams = [];

    protected $columMap=[];

    protected $operatorMap = [];

    public function transform(Request $request){

        $eloQuery = [];

        foreach($this->safeParams as $parm=>$operators){

            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }

            $column = $this->columMap[$parm] ?? $parm;

            foreach($operators as $operator){

                if(isset($query[$operator])){
                    $eloQuery[] = [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
           
        }

        return $eloQuery;
    }
}