<?php

namespace App\Models;

use DB;
use App\Models\Biaya;
use App\Models\Tagihan;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Pembayaran extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $guarded = [];
    protected $dates = ['tanggal_bayar', 'tanggal_konfirmasi'];
    protected $with = ['user', 'tagihan'];
    protected $append = ['status_konfirmasi', 'status_style'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logUnguarded()->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function getStatusStyleAttribute()
    {
        if ($this->tanggal_konfirmasi == null) {
            return 'secondary';
        }
        return 'success';
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function statusKonfirmasi(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->tanggal_konfirmasi == null)
                ? 'Belum Dikonfirmasi' : 'Sudah Dikonfirmasi',
        );
    }

    /**
     * Get the tagihan that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tagihan(): BelongsTo
    {
        return $this->belongsTo(Tagihan::class);
    }
    /**
     * Get all of the tagihanDetail for the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function biayaDetail(): HasManyThrough
    {
        return $this->hasManyThrough(Biaya::class, Tagihan::class);
    }

    /**
     * Get the bankSekolah that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bankSekolah(): BelongsTo
    {
        return $this->belongsTo(BankSekolah::class);
    }

    /**
     * Get the waliBank that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function waliBank(): BelongsTo
    {
        return $this->belongsTo(WaliBank::class);
    }

    /**
     * Get the user that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($pembayaran) {
            $pembayaran->user_id = auth()->user()->id;
        });
        static::updating(function ($pembayaran) {
            $pembayaran->user_id = auth()->user()->id;
        });
        static::created(function ($pembayaran) {
            $pembayaran->tagihan->updateStatus();
        });
        static::updated(function ($pembayaran) {
            $pembayaran->tagihan->updateStatus();
        });
        static::deleted(function ($pembayaran) {
            // ubah status tagihan
            $pembayaran->tagihan->updateStatus();

            // if pembayaran == 'tf' hapus bukti bayar
            if ($pembayaran->metode_pembayaran == 'transfer') {
                if ($pembayaran->bukti_bayar != null && Storage::exists($pembayaran->bukti_bayar)) {
                    Storage::delete($pembayaran->bukti_bayar);
                }
            }

            DB::table('notifications')->where('data->pembayaran_id', $pembayaran->id)->delete();
        });
    }

    /**
     * Get the wali that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wali(): BelongsTo
    {
        return $this->belongsTo(User::class, 'wali_id');
    }
}
