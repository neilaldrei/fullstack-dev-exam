<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourBooking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['tour_date', 'status', 'created_at'];

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'booking_passenger');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
