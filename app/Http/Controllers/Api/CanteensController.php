<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CanteensService;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\MealOrder;

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
        if($request->id_canteen && $request->id_user){
            $user = $request->id_user;
            $canteen = $request->id_canteen;
            $order = new Order();
            $mealOrd = new MealOrder();
            if($ord = $order->where('id_user', $user)->where('status', 1)->where('id_canteen', $canteen)->get()){
                //var_dump($ord[0]->id);exit;
                $id_ord = $ord[0]->id;
            } else {
                $order->id_canteen = $canteen;
                $order->id_user = $user;
                $order->status = 1;
                $order->save();
                $id_ord = $order->id;
            }
            $mealOrd->id_order = $id_ord;
            $mealOrd->id_meal = $request->id_meal;
            $mealOrd->save();
            if($mealOrd->id){
                return response()->json(['message' => "success"], 200);
            } else {
                return response()->json(['message' => "false"], 400);
            }         
        } else {
             return response()->json(['message' => "Nie prawidłowe parametry postu"], 400);
        }
//        $order = new Order();
//        $order->id_canteen = $request->id_canteen;
//        $order->id_user = Auth::id();
//        $order->status = 1;
//        $order->save();
//        $odpowiedz = $this->_service->mealOrder($request->meal, $order->id);
//        if(isset($request->options)){
//            $this->_service->mealOptions($request->options, $order->id);
//        }
//        if(!isset($odpowiedz)){
//            return response()->json([
//                'order' => $order->id
//            ], 200);
//        } else {
//            return response()->json([
//                'message' => 'Nie udało się dodać zamówienie do koszyka'
//            ], 400);
//        }
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
    
    public function deleteFromBox(Request $request){
        $idOrder = $request->id_order;
        $idMeal = $request->id_meal;
        $mealOrd = new MealOrder();
        if($mealOrd->where('id_order', $idOrder)->where('id_meal', $idMeal)->delete()){
            return response()->json(['message' => "success"], 200);
        } else {
            return response()->json(['message' => "false"], 400);
        }
    }
}