<?php

namespace App\Models;

use Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\ModelStatus\HasStatuses;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use SearchableTrait;
    use HasStatuses;
    use HasFactory;
    use LogsActivity;
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded()->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_id');
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'biaya_id')->withDefault([
            'nama' => 'Tidak ada',
            'jumlah' => 'Rp. 0'
        ]);
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    /**
     * Get the kelas that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relrombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class,'rombel','id');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($siswa) {
            $siswa->user_id = auth()->user()->id;
        });
        static::created(function ($siswa) {
            $siswa->setStatus('aktif');
        });
        static::updating(function ($siswa) {
            $siswa->user_id = auth()->user()->id;
        });
    }

    public function getFotoAttribute($value)
    {
        $defaultFoto = 'images/user.png';
        if ($value == null) {
            return $defaultFoto;
        }
        return (Storage::exists($value)) ? $value : $defaultFoto;
    }
    public static function getKategori($id)
    {
        $siswa = self::find($id);
        if ($siswa) {
            return $siswa->kategori;
        }
        return null;
    }

    protected $searchable = [
        'columns' => [
            'nama' => 10,
            'nisn' => 10,
        ],
    ];
}
