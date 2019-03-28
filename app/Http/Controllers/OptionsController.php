<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Options;

class OptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $options = new Options();
        $options->name = $request->name;
        $options->weight = $request->weight;
        $options->price = $request->price;
        $options->id_meal = 1;
        $options->save();
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $options = Options::all();
        return view('storeoptions',['data' => $options]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $option = Options::find($id);
       // var_dump($option);
        return response()->json($option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $option = Options::find($request->id);
        $option->name = $request->name;
        $option->weight = $request->weight;
        $option->price = $request->price;
        $option->save();
        return redirect ('storeoptions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Options::find($id);
        $option->delete();        
    }
}
