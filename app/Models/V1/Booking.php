<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_SUBMITTED = 0;
    
    const STATUS_CONFIRMED = 1;

    const STATUS_CANCELLED = 2;

    protected $guarded = ['id'];

    protected $fillable = ['tour_id', 'tour_date', 'status', 'created_at'];

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
