<?php

namespace App\Http\Controllers;

use App\Models\Ask;

use Illuminate\Http\Request;
use App\Http\Requests\Ask\StoreRequest;
use App\Http\Requests\Ask\UpdateRequest;

class AskController extends Controller
{
    //
    public function index(){
        return Ask::all();
    }

    public function store(StoreRequest $request){

        // $request->validate([
        //     'title' => 'required',
        //     'desc' => 'required'
        // ]);

        return Ask::create($request->all());
    }

    public function show($id){
        return Ask::find($id);
    }

    public function update(UpdateRequest $request, $id){

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
