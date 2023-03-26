<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use Smalot\PdfParser\Parser;
use thiagoalessio\TesseractOCR\TesseractOCR;
use GuzzleHttp\Client;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pdfscan.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get the uploaded file
        $file = $request->file('pdf');
        $filename = $file->getClientOriginalName();
        // dd($filename);
        
        // $filename = public_path('uploads/Data Sample for Peter-12.pdf');
        $client = new Client(['base_uri' => 'https://api.ocr.space/']);

        $response = $client->request('POST', 'parse/image', [
            'headers' => [
                'apikey' => 'K89452015788957',
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => file_get_contents($file->getPathname()),
                    'filename' => 'file.pdf'
                ],
                [
                    'name' => 'language',
                    'contents' => 'eng', // Set the language code
                ], [
                    'name' => 'isOverlayRequired',
                    'contents' => 'true', // Set to true if you need OCR overlay data
                ],
                [
                    'name' => 'OCREngine',
                    'contents' => '5', // Set the OCR engine
                ],
            ]
        ]);

        $result = json_decode($response->getBody(), true);
        $parsedResult = $result['ParsedResults'][0]['TextOverlay'];


        $model = $parsedResult['Lines'][0]['LineText'];
        $form_version = $parsedResult['Lines'][169]['LineText'];
        $date = $parsedResult['Lines'][3]['LineText'];
        $producer1 = $parsedResult['Lines'][14]['LineText'];
        $producer2 = $parsedResult['Lines'][16]['LineText'];
        $producer3 = $parsedResult['Lines'][20]['LineText'];
        $insurer1 = $parsedResult['Lines'][25]['LineText'];
        $insurer2 = $parsedResult['Lines'][26]['LineText'];
        $insurer3 = $parsedResult['Lines'][27]['LineText'];
        $insurer4 = $parsedResult['Lines'][28]['LineText'];
        $contact_name = $parsedResult['Lines'][12]['LineText'];
        $contact_phone = $parsedResult['Lines'][17]['LineText'];
        $contact_fax = $parsedResult['Lines'][19]['LineText'];
        $contact_email = $parsedResult['Lines'][21]['LineText'];
        dd($parsedResult);
        return $result['ParsedResults'][0]['ParsedText'];
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filename = public_path('uploads/Data Sample for Peter-12.pdf');
        $client = new Client(['base_uri' => 'https://api.ocr.space/']);

        $response = $client->request('POST', 'parse/image', [
            'headers' => [
                'apikey' => 'K89452015788957',
            ],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($filename, 'r'),
                    'filename' => 'file.pdf'
                ],
                [
                    'name' => 'language',
                    'contents' => 'eng', // Set the language code
                ], [
                    'name' => 'isOverlayRequired',
                    'contents' => 'true', // Set to true if you need OCR overlay data
                ],
                [
                    'name' => 'OCREngine',
                    'contents' => '5', // Set the OCR engine
                ],
            ]
        ]);

        $result = json_decode($response->getBody(), true);
        $parsedResult = $result['ParsedResults'][0]['TextOverlay'];
        dd($parsedResult);
        return $result['ParsedResults'][0]['ParsedText'];
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
