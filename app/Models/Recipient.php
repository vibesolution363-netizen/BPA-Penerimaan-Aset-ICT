<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipient extends Model
{
    protected $fillable = [
        'nama',
        'profil',
        'tahun',
        'signature',
    ];

    public function assets(): HasMany
    {
        return $this->hasMany(Asset::class);
    }

    public function isDiterima(): bool
    {
        return !is_null($this->signature);
    }
}
