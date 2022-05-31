<?php

namespace App\Http\Controllers\V1\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PassengerStoreRequest;
use App\Http\Resources\V1\PassengerResource;
use App\Models\V1\Passenger;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PassengerStoreRequest $request)
    {
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            $passenger = Passenger::create($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new PassengerResource($passenger);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\V1\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function show(Passenger $passenger)
    {
        return new PassengerResource($passenger);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\V1\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function update(PassengerStoreRequest $request, Passenger $passenger)
    {
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            $passenger->update($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new PassengerResource($passenger);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\V1\Passenger  $passenger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        DB::beginTransaction();
        try {
            $passenger->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new PassengerResource($passenger);
    }
}
