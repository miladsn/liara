<?php

namespace App\Http\Controllers;

use App\Services\NeshanService;
use Illuminate\Http\JsonResponse;

class NeshanController extends Controller
{
    protected $neshanService;

    public function __construct(NeshanService $neshanService)
    {
        $this->neshanService = $neshanService;
    }

    /**
     * @return JsonResponse
     */
    public function getLocationInfo(): \Illuminate\Http\JsonResponse
    {
        $lat = 36.33068504194033;
        $lng = 59.502822690225045;

    //call neshan
        $output = $this->neshanService->getLocationInfo($lat, $lng);

        if ($output) {
            return response()->json([
                'message' => 'خروجی سرویس نشان ذخیره شد',
                'data' => $output
            ], 200);
        }

        return response()->json([
            'message' => 'خطا در فراخوانی سرویس نشان'
        ], 500);
    }
}

