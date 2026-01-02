<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonRecordController extends Controller
{
    /public function getApiEntry()
    {
        $url = "https://pokeapi.co/api/v2/pokemon/";
        $response = Http::get(
            $url
        );
        $responseBodyClient = $response->json();
        $externalApiEntries = $responseBodyClient['entries'];

        foreach ($externalApiEntries as $externalApiEntry) {
            ApiEntry::updateOrInsert(
                [
                    'name' => $externalApiEntry['name'],
                    'base_experience' => $externalApiEntry['base_experience'],
                    'weight' => $externalApiEntry['weight'],
                    'image_url' => $externalApiEntry['image_url'],
                ],
            );
        }
    }
    
    **
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
