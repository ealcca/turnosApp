<?php

namespace App\Http\Controllers;

use App\Models\Turn;
use App\Models\Client;
use App\Http\Requests\CreateTurnRequest;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turns = Turn::with('Client')
            ->orderBy('date','desc')
            ->get(); 
        return view('turns.index',['turns'=>$turns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $clients = Client::all();
        return view('turns.create',['clients'=> $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTurnRequest $request)
    {
        $input = $request->all();
        $input['done'] = false;
        Turn::create($input);
        return redirect('turns');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
        $clients = Client::all();
        return view('turns.edit',['turn'=>$turn,'clients'=>$clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(CreateTurnRequest $request, Turn $turn)
    {
        $input = $request->all();
        $turn->update($input);
        return redirect('turns');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
        //
    }
}
