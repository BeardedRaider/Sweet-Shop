<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Review; // Added for relationship
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * Only fields listed here can be mass-assigned (e.g. via $user->update($validated)).
     * We explicitly include delivery address fields so they can be updated safely
     * through forms, while excluding sensitive fields like 'role' to prevent misuse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address_line1',
        'address_line2',
        'city',
        'postcode',
        'country',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * These fields will not be returned when the model is converted to arrays or JSON.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * Casting ensures values are automatically converted to the correct type.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship: many-to-many with Role model.
     * A user can have multiple roles (e.g. admin, customer).
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Helper method: check if user has a specific role.
     */
    public function hasRole($roleName)
    {
        return $this->roles->contains('name', $roleName);
    }

    /**
     * Relationship: one-to-many with Review model.
     * A user can leave multiple reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Relationship: one-to-many with Order model.
     * A user can have multiple orders.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
