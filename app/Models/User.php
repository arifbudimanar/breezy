<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_verified',
        'is_admin',
        'email_verified_at'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_verified' => 'boolean',
        'is_admin' => 'boolean',
        'password' => 'hashed'
    ];
    public function getFirstNameAttribute(): string
    {
        return explode(' ', $this->name)[0];
    }
    public function isAdmin(): bool
    {
        return $this->is_admin == true;
    }
    public function isVerified(): bool
    {
        return $this->is_verified == true;
    }
    public function emailVerified(): bool
    {
        return $this->email_verified_at !== null;
    }
    public function completedProfile(): bool
    {
        return $this->name !== null && $this->email !== null && $this->password !== null;
    }
}
