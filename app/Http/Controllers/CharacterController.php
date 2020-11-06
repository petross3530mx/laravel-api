<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Services\Formatter;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->name){
            return $this->FindByName($request->name);
        }
        else{

            $eloquent_params = Formatter::formatEloquent(Character::$default_limit, $request);

            $result =  Character::with(['quotes'])->skip($eloquent_params->skip)->take($eloquent_params->limit)->get();
    
            $count = Character::all()->count() ?? 0;
    
            $errors = sizeof($result) ? false :'Nothing found';
    
            return  Formatter::getResponse($result->toArray(), $eloquent_params, $errors, $count);
        }

    }

    public function random(){
        if( $character = Character::inRandomOrder()->first() ){
            return Formatter::getResponse($character);
        }
        return response('Not Found', 404);
    }

    private function findByName($name){

        $collumn = 'name';

        if( $character = Character::whereRaw( 'LOWER(`name`) LIKE ?', [ $name ] )->first()){
            return Formatter::getResponse($character);
        }

        return response('Not Found', 404);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
    }
}
