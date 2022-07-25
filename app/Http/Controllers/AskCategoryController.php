<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskCategory;
use App\Http\Requests\AskCategory\StoreRequest;
use App\Http\Requests\AskCategory\UpdateRequest;

class AskCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AskCategory::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $askCategory = AskCategory::create($request->only([
            'name',
        ]));
        
        return response()->json([
            'askCategory' => $askCategory->toArray(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            'askCategory' => AskCategory::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $askCategory = AskCategory::find($id);
        
        if(empty($askCategory))
        {
            return response()->json(
                [ 
                    'message' => "Can't find any askCategory" 
                ], 
                404
            );
        }
        
        $askCategory->update($request->only([
            'name',
        ]));

        return response()->json([
            'askCategory' => $askCategory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return AskCategory::destroy($id);
    }
}
