<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata_1147 extends Model
{
    protected $table = 'biodata_1147s';
    protected $fillable = ['nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_hp', 'alamat', 'prodi_id', 'foto'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
