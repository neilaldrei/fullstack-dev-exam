<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passenger extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_DISABLED = 0;
    
    const STATUS_ENABLED = 1;

    protected $guarded = ['id'];

    protected $fillable = ['given_name', 'surname', 'email', 'mobile', 'passport', 'birth_date', 'status', 'created_at'];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_passenger');
    }
}
