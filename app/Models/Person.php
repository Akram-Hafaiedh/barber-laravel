<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    const ROLES = [
        'manager' => 'Manager',
        'staff' => 'Staff',
        'marketing' => 'Marketing',
    ];

    protected $table = 'people';
    protected $fillable = [
        'name',
        'phone',
        'location_id',
        'email',
        'notes',
        'role',
    ];


    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongstoMany(Service::class, 'service_person');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
