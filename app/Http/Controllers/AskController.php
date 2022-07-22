<?php

namespace App\Http\Controllers;

use App\Models\Ask;

use Illuminate\Http\Request;

class AskController extends Controller
{
    //
    public function index(){
        return Ask::all();
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'desc' => 'required'
        ]);

        return Ask::create($request->all());
    }

    public function show($id){
        return Ask::find($id);
    }

    public function update(Request $request, $id){

        $ask = Ask::find($id);
        $ask->update($request->all());
        return $ask;
    }

    public function destroy($id){
        return Ask::destroy($id);
    }

    public function search($title){
        return Ask::where('title','like','%'.$title.'%')->get();
    }



}
