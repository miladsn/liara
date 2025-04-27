<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class NeshanService
{
    protected string $apiUrl;
    protected string $apiKey;


    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }


    public function getLocationInfo($lat, $lng)
    {
        $response = Http::withHeaders([
            'Api-Key' => $this->apiKey
        ])->get($this->apiUrl, ['lat' => $lat,
            'lng' => $lng]);
        if ($response->successful()) {
            $output = $response->json();
            Storage::disk('local')->put('output.json', json_encode($output, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return $output;
        }
        return null;
    }
}
