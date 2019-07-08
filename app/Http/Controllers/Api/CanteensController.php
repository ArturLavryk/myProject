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
    public function canteens($id = 0) {
        $result = $this->_service->getAll($id);               
        if(isset($result)){
        return response()->json($result);
        }else{
          return response()->json([
                'message' => 'Ta jadalnia nie istnieje'
            ], 401);  
        }
    }
    
    public function meals($canteenId = 0){
        if($canteenId != 0){
            $result = $this->_service->getMeal($canteenId);
        } else {
            $result = $this->_service->meal();    
        }
        
        if(isset($result)){
            return response()->json($result);
        }else {
            return response()->json([
                'message' => 'Ta jadalnia nie posiada jeszcze potraw'
            ], 401);
        }
    }
    
    public function options(){
        $result = Response()->json($this->_service->getOptions());
        return $result;
    }
    
    public function box(Request $request){
        $order = new Order();
        $order->id_canteen = $request->id_canteen;
        $order->id_user = Auth::id();
        $order->time = $request->time;
        $order->status = 1;
        $order->save();
        $odpowiedz = $this->_service->mealOrder($request->meal, $order->id);
        if(isset($request->options)){
            $this->_service->mealOptions($request->options, $order->id);
        }
        if(!isset($odpowiedz)){
            return response()->json([
                'order' => $order->id
            ], 200);
        } else {
            return response()->json([
                'message' => 'Zamówienie nie zrealizowano'
            ], 401);
        }
    }
    
    public function getCanteenMeals($canteenId) {
       $meals = $this->_service->mealCanteen($canteenId);
       if(!empty($meals)){
            return response()->json($meals, 200);
        } else {
            return response()->json(['message' => 'Restauracja jeszcze nie posiada straw'], 400);
        }
    }
    
    public function getBoxOrder($idUser){
       $data = $this->_service->getBox($idUser);
       if(isset($data)){
            return response()->json($data);
       }else{
            return response()->json(['message' => 'Koszyk jest pusty.'],401); 
       }
    }
    
    public function orderSuccess($idOrder){
        $order = Order::find($idOrder);
        $order->status = 2;
        $order->save();
        return response()->json(['message' => 'Zatwierdzono'],200);
    }
}