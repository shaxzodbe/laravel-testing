<?php

namespace App\Models;

use App\Enum\ProjectLevel;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Schema\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use function Pest\Laravel\get;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'birth_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
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
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'date:m/d/Y',
        'project_level' => ProjectLevel::class
    ];

    public function createdDiff(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at->diffForHumans()
        );
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst($value)
        );
    }

    public function birthDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y'),
            set: fn($value) => Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d')
        );
    }

    public function getCreatedDiffAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function scopeEmail($query, string $email)
    {
        $query->where('email', $email);
    }
}
