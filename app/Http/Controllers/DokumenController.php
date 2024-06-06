<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Draft;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;





class DokumenController extends Controller
{
    public function input(){
        return view('input_dokumen');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'deskripsi_dokumen' => 'required|string',
            'kategori_dokumen' => 'required|string',
            'validasi_dokumen' =>'required|string',
            'tahun_dokumen' => 'required|int',
            'dokumen_file' => 'required|file|mimes:pdf,docx,jpeg,png,jpg|max:2048', 
            'tags' => 'nullable|string',
        ]);

      
        $fileName = $request->dokumen_file->getClientOriginalName();
        $request->dokumen_file->storeAs('public/documents', $fileName);
        

        $dokumen = Dokumen::create([
            'judul_dokumen' => $validatedData['judul_dokumen'],
            'deskripsi_dokumen' => $validatedData['deskripsi_dokumen'],
            'kategori_dokumen' => $validatedData['kategori_dokumen'],
            'validasi_dokumen' =>$validatedData['validasi_dokumen'],
            'tahun_dokumen' => $validatedData['tahun_dokumen'],
            'dokumen_file' => $fileName,
            'tags' => $validatedData['tags'],
            'status' =>'active',
           
        ]);

        return redirect()->route('list-dokumen')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    public function listDokumen()
    {
        $documents = Dokumen::where('status', '!=', 'draft')->get();
        return view('list-dokumen', ['documents' => $documents]);
    }

    public function processList(Request $request)
    {
        return redirect()->route('list-dokumen')->with('success', 'Data berhasil diproses.');
    }

    public function edit($id)
    {
        $document = Dokumen::findOrFail($id);
        return view('edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Dokumen::findOrFail($id);
        
        $validatedData = $request->validate([
            'judul_dokumen' => 'required|string|max:255',
            'deskripsi_dokumen' => 'required|string',
            'kategori_dokumen' => 'required|string',
            'validasi_dokumen' => 'required|string',
            'tahun_dokumen' => 'required|int',
            'dokumen_file' => 'nullable|file|mimes:pdf,docx,jpeg,png,jpg|max:2048',
            'tags' => 'nullable|string',
      
            
        ]);
        if ($request->hasFile('edit_dokumen_file')) {
            if ($document->dokumen_file) {
                Storage::disk('public')->delete('documents/' . $document->dokumen_file);
            }
            // Unggah file baru dengan nama asli
            $fileName = $request->edit_dokumen_file->getClientOriginalName();
            $request->edit_dokumen_file->storeAs('public/documents', $fileName);
            // Update nama file dokumen
            $document->dokumen_file = $fileName;
        }
    
        // Update data dokumen
        $document->judul_dokumen = $validatedData['judul_dokumen'];
        $document->deskripsi_dokumen = $validatedData['deskripsi_dokumen'];
        $document->kategori_dokumen = $validatedData['kategori_dokumen'];
        $document->validasi_dokumen = $validatedData['validasi_dokumen'];
        $document->tahun_dokumen = $validatedData['tahun_dokumen'];
        $document->tags = $validatedData['tags'];
        $document->save();

        return redirect()->route('list-dokumen')->with('success', 'Details dokumen berhasil diperbarui.');
    }
    
    public function moveToDraft($id)
    {
        $document = Dokumen::findOrFail($id);
    
        Log::info('Menghapus dokumen dengan ID: '.$id, ['document' => $document]);

        $draft = Draft::create([
            'judul_dokumen' => $document->judul_dokumen,
            'deskripsi_dokumen' => $document->deskripsi_dokumen,
            'kategori_dokumen' => $document->kategori_dokumen,
            'validasi_dokumen'=>$document ->validasi_dokumen,
            'tahun_dokumen' => $document->tahun_dokumen,
            'dokumen_file' => $document->dokumen_file,
            'tags' => $document->tags,
            'status' => 'draft',
        ]);

        Log::info('Dokumen dipindahkan ke draft', ['draft' => $draft]);
    
        // Hapus dokumen dari tabel Dokumen
        $document->delete();
  
        Log::info('Dokumen dihapus dari tabel dokumens', ['document' => $document]);
    
        return redirect()->route('list-dokumen')->with('success', 'Dokumen berhasil dihapus');
    }

};