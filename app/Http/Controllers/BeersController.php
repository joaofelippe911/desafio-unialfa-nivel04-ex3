<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Response;
use File;

class BeersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beers = Http::get("https://api.punkapi.com/v2/beers")->json();

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/download.csv");
        $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "Name",
            "Description",
        ], ";");

        foreach ($beers as $beer) {
            fputcsv($handle, [
                $beer["name"],
                $beer["description"]
            ], ";");
        }

        fclose($handle);

        return [
            "status" => "ok",
            "mensagem" => "Dados gravados com sucesso",
            "dados" => $beers
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

    public function download() {
        $headers = array(
            'Content-Type' => 'text/csv'
        );

        $filename =  public_path("files/download.csv");

        return Response::download($filename, 'download.csv', $headers);
    }
}
