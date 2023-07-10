<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data_mahasiswa extends Model
{
    protected $guarded = [];
    protected $fillable = ['nim', 'nama_mahasiswa', 'id_prodi'];

    public function data_prodi(): BelongsTo
    {
        return $this->belongsTo(data_prodi::class, 'id_prodi');
    }
}
