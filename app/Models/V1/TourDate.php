<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourDate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['tour_id', 'date', 'status'];

    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
