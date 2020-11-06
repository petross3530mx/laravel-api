<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Services\Formatter;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $eloquent_params = Formatter::formatEloquent(Episode::$default_limit, $request);

        $result =  Episode::with(['characters', 'quotes'])->skip($eloquent_params->skip)->take($eloquent_params->limit)->get();

        $count = Episode::all()->count() ?? 0;

        $errors = sizeof($result) ? false :'Nothing found';

        return  Formatter::getResponse($result->toArray(), $eloquent_params, $errors, $count);
    }


    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Reques
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        //return  Episode::findOrFail($request->id);

        if( $episode = Episode::find($request->id) ){
            return Formatter::getResponse($episode);
        }
        return response('Not Found', 404);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
