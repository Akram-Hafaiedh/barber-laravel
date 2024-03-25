<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $hidden = [
        'pivot'
    ];
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'status'
    ];

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'service_person');
    }
    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class, 'reservation_service');
    }
}
