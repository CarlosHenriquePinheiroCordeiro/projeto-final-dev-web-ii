<?php

namespace App\Http\Controllers;

use App\Models\Amazon;
use Illuminate\Http\Request;

class AmazonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Amazon::all();
        return view('amazon.index', compact('dados'));
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
     * @param  \App\Models\Amazon  $amazon
     * @return \Illuminate\Http\Response
     */
    public function show(Amazon $amazon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amazon  $amazon
     * @return \Illuminate\Http\Response
     */
    public function edit(Amazon $amazon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amazon  $amazon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amazon $amazon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amazon  $amazon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amazon $amazon)
    {
        //
    }
}
