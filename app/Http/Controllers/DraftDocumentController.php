<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Draft;

class DraftDocumentController extends Controller
{
    // Menampilkan halaman draft dokumen
    public function index()
    {
        $draftDokumens = Draft::with('dokumen')->where('status', 'draft')->get();
        return view('draft-dokumens.index', compact('draftDokumens'));
    }

     public function moveToDraft($id)
     {
        $dokumen = Dokumen::find($id);
        if ($dokumen) {
            Draft::create([
                'judul_dokumen' => $dokumen->judul_dokumen,
                'deskripsi_dokumen' => $dokumen->deskripsi_dokumen,
                'kategori_dokumen' => $dokumen->kategori_dokumen,
                'tahun_dokumen' => $dokumen->tahun_dokumen,
                'dokumen_file' => $dokumen->dokumen_file,
                'tags' => $dokumen->tags,
                'status' => 'draft',
            ]);    
            
             return redirect()->route('dokumens.index')->with('status', 'Dokumen dipindahkan ke draft');
         } else {
             return redirect()->route('dokumens.index')->with('error', 'Dokumen tidak ditemukan');
         }
     }
}
