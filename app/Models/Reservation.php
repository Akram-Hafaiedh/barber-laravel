<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['time', 'user_id', 'location_id', 'date', 'person_id', 'total'];
    protected $guarded = [];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'reservation_service');
    }
}
