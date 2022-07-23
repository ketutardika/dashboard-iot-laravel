<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
    
    
    function get_setting($column) {
        $arraycolumn=DB::table('setting_generals')->select($column)->where('id',1)->first();
        foreach ($arraycolumn as $column) {           
        return $column;              
        }
    }
    
        
?>