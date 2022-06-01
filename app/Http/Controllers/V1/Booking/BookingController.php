<?php

namespace App\Http\Controllers\V1\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BookingStoreRequest;
use App\Http\Resources\V1\BookingResource;
use App\Models\V1\Booking;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            $booking = Booking::create($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new BookingResource($booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\V1\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return new BookingResource($booking);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\V1\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingStoreRequest $request, Booking $booking)
    {
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            $booking->update($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new BookingResource($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\V1\Booking  $tourBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        DB::beginTransaction();
        try {
            $booking->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new BookingResource($booking);
    }
}
