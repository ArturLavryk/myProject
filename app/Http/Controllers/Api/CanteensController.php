<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CanteensService;
use App\Order;
use Illuminate\Support\Facades\Auth;

class CanteensController extends Controller {
    

    protected $_service;

    public function __construct() {
        $this->_service = new CanteensService();
    }

    /**
     * GET METHOD
     */
    public function canteens() {
        $result = Response()->json($this->_service->getAll());
        return $result;
    }
    
    public function meals($id){
        if(!empty($this->_service->getMeals($id))){
            $result = Response()->json($this->_service->getMeals($id));
        } else {
            $result = Response()->json(['message' => 'Restauracja nie posada żadnej strawy'], 400);    
        }
        
        return $result;
    }
    
    public function options(){
        $result = Response()->json($this->_service->getOptions());
        return $result;
    }
    
    public function order(Request $request){
        $order = new Order();
        $order->id_canteen = $request->id_canteen;
        $order->id_user = Auth::id();
        $order->time = $request->time;
        $order->save();
        $odpowiedz = $this->_service->mealOrder($request->meal, $order->id);
        if(isset($request->options)){
            $this->_service->mealOptions($request->options, $order->id);
        }
        if(!empty($odpowiedz)){
            return $odpowiedz;
        }
    }
}