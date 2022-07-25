<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AskFormat;
use App\Http\Requests\AskFormat\StoreRequest;
use App\Http\Requests\AskFormat\UpdateRequest;

class AskFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AskFormat::all();
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
        $askFormat = AskFormat::create($request->only([
            'name',
        ]));
        
        return response()->json([
            'askFormat' => $askFormat->toArray(),
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
            'askFormat' => AskFormat::find($id)
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
        $askFormat = AskFormat::find($id);
        
        if(empty($askFormat))
        {
            return response()->json(
                [ 
                    'message' => "Can't find any askFormat" 
                ], 
                404
            );
        }
        
        $askFormat->update($request->only([
            'name',
        ]));

        return response()->json([
            'askFormat' => $askFormat
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
        return AskFormat::destroy($id);
    }
}
