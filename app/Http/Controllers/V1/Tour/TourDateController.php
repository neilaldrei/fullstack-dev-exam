<?php

namespace App\Http\Controllers\V1\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\TourDateRequest;
use App\Http\Resources\V1\TourDateResource;
use App\Models\V1\TourDate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourDateController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourDateRequest $request)
    {
        $attributes = $request->validated();

        DB::beginTransaction();
        try {
            foreach($request['dates'] as $date) {
                $attributes['date'] = $date;
                $tourDate = TourDate::create($attributes);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new TourDateResource($tourDate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\V1\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function show(TourDate $tourDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\V1\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function edit(TourDate $tourDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\V1\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourDate $tourDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\V1\TourDate  $tourDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(TourDate $tourDate)
    {
        //
    }
}
