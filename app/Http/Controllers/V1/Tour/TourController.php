<?php

namespace App\Http\Controllers\V1\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\TourStoreRequest;
use App\Http\Resources\V1\TourResource;
use App\Models\V1\Tour;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::where('status', Tour::STATUS_PUBLIC)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return TourResource::collection($tours);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourStoreRequest $request)
    {
        $attributes = $request->validated();

        DB::beginTransaction();

        try {
            $tour = Tour::create($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new TourResource($tour);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\V1\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function show(Tour $tour)
    {
        return new TourResource($tour->load('tourDates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\V1\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function update(TourStoreRequest $request, Tour $tour)
    {
        $attributes = $request->validated();

        DB::beginTransaction();

        try {
            $tour->update($attributes);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new TourResource($tour);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\V1\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tour $tour)
    {

        DB::beginTransaction();
        try {
            $tour->delete();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return response ([
                'message' => $e,
            ], 422);
        }

        return new TourResource($tour);
    }
}
