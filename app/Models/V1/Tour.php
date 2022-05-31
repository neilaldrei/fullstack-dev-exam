<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_DRAFT = 0;
    
    const STATUS_PUBLIC = 1;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'itenary', 'status', 'created_at'];

    public function tourDates()
    {
        return $this->hasMany(TourDate::class);
    }

    public function bookings()
    {
        return $this->hasMany(TourBooking::class);
    }
}
