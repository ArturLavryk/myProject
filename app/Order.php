<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $data;
    
    public function getUserOrder($id){
        $this->data = Order::where('id_user', '=', $id)->where('status', '=', 1)->get();
        
        return $this->data;
    }
}
