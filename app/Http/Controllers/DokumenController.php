<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;



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
            'tahun_dokumen' => 'required|int',
            'dokumen_file' => 'required|file|mimes:pdf,docx,jpeg,png,jpg|max:2048', // Adjust file types and size limits as needed
            'tags' => 'nullable|string',
        ]);

        // Handle file upload (assuming 'dokumen_file' is the file input name)
        $fileName = time().'.'.$request->dokumen_file->getClientOriginalExtension();
        $request->dokumen_file->storeAs('public/documents', $fileName);

        $dokumen = Dokumen::create([
            'judul_dokumen' => $validatedData['judul_dokumen'],
            'deskripsi_dokumen' => $validatedData['deskripsi_dokumen'],
            'kategori_dokumen' => $validatedData['kategori_dokumen'],
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
            'tahun_dokumen' => 'required|int',
            'dokumen_file' => 'nullable|file|mimes:pdf,docx,jpeg,png,jpg|max:2048',
            'tags' => 'nullable|string',
      
            
        ]);
        if ($request->hasFile('edit_dokumen_file')) {
            // Handle file upload
            $fileName = time().'.'.$request->edit_dokumen_file->getClientOriginalExtension();
            $request->edit_dokumen_file->storeAs('public/documents', $fileName);
            
            // Update document file name
            $document->dokumen_file = $fileName;
        }

        $document->update($validatedData);

        return redirect()->route('list-dokumen')->with('success', 'Details dokumen berhasil diperbarui.');
    }
    // DokumenController.php

    public function destroy($id)
    {
        $document = Dokumen::findOrFail($id);
    
        // Log informasi dokumen sebelum pemindahan
        Log::info('Menghapus dokumen dengan ID: '.$id, ['document' => $document]);
    
        // Pindahkan data ke tabel drafts sebelum menghapus dari dokumen
        $draft = Draft::create([
            'judul_dokumen' => $document->judul_dokumen,
            'deskripsi_dokumen' => $document->deskripsi_dokumen,
            'kategori_dokumen' => $document->kategori_dokumen,
            'tahun_dokumen' => $document->tahun_dokumen,
            'dokumen_file' => $document->dokumen_file,
            'tags' => $document->tags,
            'status' => 'draft',
        ]);
    
        // Log informasi draft setelah pemindahan
        Log::info('Dokumen dipindahkan ke draft', ['draft' => $draft]);
    
        // Hapus dokumen dari tabel Dokumen
        $document->delete();
    
        // Log setelah penghapusan dokumen
        Log::info('Dokumen dihapus dari tabel dokumens', ['document' => $document]);
    
        return redirect()->route('list-dokumen')->with('success', 'Dokumen berhasil dihapus');
    }

};