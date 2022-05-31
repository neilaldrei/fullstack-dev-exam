<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['given_name', 'surname', 'email', 'mobile', 'passport', 'birth_date', 'status', 'created_at'];

    public function bookings()
    {
        return $this->belongsToMany(TourBooking::class, 'booking_passenger');
    }
}
