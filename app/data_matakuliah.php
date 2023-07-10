<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class data_matakuliah extends Model
{
    protected $guarded = [];
    protected $fillable = ['nama_matakuliah', 'id_prodi'];

     /**
     * Get the user that owns the data_matakuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function data_prodi(): BelongsTo
    {
        return $this->belongsTo(data_prodi::class, 'id_prodi');
    }
    /**
     * Get all of the comments for the data_matakuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data_mahasiswa(): HasMany
    {
        return $this->hasMany(data_mahasiswa::class);
    }
}
