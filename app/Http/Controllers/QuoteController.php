<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Services\Formatter;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eloquent_params = Formatter::formatEloquent(Quote::$default_limit, $request);

        $result =  Quote::skip($eloquent_params->skip)->take($eloquent_params->limit)->get();

        $count = Quote::all()->count() ?? 0;

        $errors = sizeof($result) ? false :'Nothing found';

        return  Formatter::getResponse($result->toArray(), $eloquent_params, $errors, $count);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function random(Request $request)
    {
        $author =  $request->author;

        $eloquent_params = Formatter::formatEloquent(Quote::$default_limit, $request);
        
        $result =  Quote::join('characters', 'quotes.character_id', '=', 'characters.id', 'left outer')->where('characters.name', $author)->get()->skip($eloquent_params->skip)->take($eloquent_params->limit);

        $count = Quote::join('characters', 'quotes.character_id', '=', 'characters.id', 'left outer')->where('characters.name', $author)->count() ?? 0;
    
        $errors = sizeof($result) ? false :'Nothing found';

        return  Formatter::getResponse($result->toArray(), $eloquent_params, $errors, $count);
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
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function edit(Quote $quote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quote  $quote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        //
    }
}
