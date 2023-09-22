<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rombel extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get all of the siswa for the Rombel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class,'rombel','id');
    }
    /**
     * Get the walikelas that owns the Rombel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function walikelas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'walikelas_id');
    }
/**
     * Get the ketuakelas associated with the Rombel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ketuakelas(): HasOne
    {
        return $this->hasOne(Siswa::class, 'id', 'ketuakelas_id');
    }
}
