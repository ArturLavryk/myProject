<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderOptions extends Model
{
       public $data;
    
    public function getIdOption($id){
        $this->data = OrderOptions::where('id_order', '=', $id)->get();
        
        return $this->data;
    }
}
