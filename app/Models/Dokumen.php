<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
        protected $fillable = [
            'judul_dokumen',
            'deskripsi_dokumen',
            'kategori_dokumen',
            'validasi_dokumen',
            'tahun_dokumen',
            'dokumen_file',
            'tags',
         
        ];
        public function histories()
        {
            return $this->hasMany(History::class);
        }   
}

