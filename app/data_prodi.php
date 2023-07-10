<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_prodi extends Model
{
    protected $guarded = [];
    protected $fillable = ['nama_prodi'];

    /**
     * Get all of the comments for the data_prodi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data_matakuliah(): HasMany
    {
        return $this->hasMany(data_matakuliah::class, 'id_prodi');
    }

    public function data_mahasiswa(): HasMany
    {
        return $this->hasMany(data_mahasiswa::class);
    }
}
