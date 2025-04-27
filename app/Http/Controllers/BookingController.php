<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TravelPackage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    /**
     * @param Request $request
     * @param $packageId
     * @return JsonResponse
     */
    public function store(Request $request, $packageId): \Illuminate\Http\JsonResponse
    {

        $validated = $request->validate([
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'travel_date' => 'required|date',
        ]);

        $package = TravelPackage::find($packageId);

        if (!$package) {
            return response()->json([
                'message' => 'پکیج مورد نظر پیدا نشد.',
            ], 404);
        }

        $booking = $package->bookings()->create([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'travel_date' => $validated['travel_date'],
        ]);

        return response()->json([
            'message' => 'رزرو با موفقیت ثبت شد',
            'booking' => $booking,
        ], 201);
    }
}
