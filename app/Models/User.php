<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Rombel;
use Laravel\Sanctum\HasApiTokens;
use Shetabit\Visitor\Traits\Visitor;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SearchableTrait, Visitor;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'akses',
        'nohp',
        'nohp_verified_at',
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
        'email_verified_at' => 'datetime',
    ];

    public function scopeWali($q)
    {
        return $q->where('akses', 'wali');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class, 'wali_id', 'id');
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rombel(): HasOne
    {
        return $this->hasOne(Rombel::class,'walikelas_id','id');
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'wali_id', 'id');
    }

    public function getAllSiswaId()
    {
        return $this->siswa->pluck('id')->toArray();
    }

    protected $searchable = [
        'columns' => [
            'name' => 10,
            'nohp' => 10,
            'email' => 10,
        ],
    ];
}
