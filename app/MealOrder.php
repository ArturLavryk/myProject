<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    public $data;
    
    public function getIdMeal($id){
        $this->data = MealOrder::where('id_order', '=', $id)->get();
        
        return $this->data;
    }
    
}
