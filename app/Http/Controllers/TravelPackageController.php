<?php

namespace App\Http\Controllers;

use App\Models\TravelPackage;
use App\Services\TravelPackageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class TravelPackageController extends Controller
{
    protected TravelPackageService $travelService;

    public function __construct(TravelPackageService $travelService)
    {
        $this->travelService = $travelService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->travelService->getFormattedPackages());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
        ]);

        $package = TravelPackage::create($validated);

        return response()->json($package, 201);
    }


}
