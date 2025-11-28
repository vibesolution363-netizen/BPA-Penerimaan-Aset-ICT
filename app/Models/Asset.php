<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    protected $fillable = [
        'recipient_id',
        'tahun',
        'jenis',
        'tarikh_penerimaan',
        'siri_device',
        'siri_adapter',
        'siri_dvd_drive',
        'siri_cord',
        'siri_dongle',
        'siri_mouse',
        'siri_monitor',
        'siri_keyboard',
        'siri_ups',
    ];

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(Recipient::class);
    }
}
