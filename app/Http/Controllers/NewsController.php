<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return ('in index method');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return ('in create method');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return ('in store method');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return ('in show method');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return ('in edit method');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return ('in update method');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return ('in destroy method');
    }
}
