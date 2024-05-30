@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
            <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
            <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
            <a class="nav-link" id="v-pills-messages-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">Draft Dokumen</a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h3 class="judul">EDIT DOKUMEN</h3>
                <form action="{{ route('dokumen.update', $document->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    
                    <div>
                        <label class="form-label">Judul Dokumen:</label>
                        <input class="form-control" name="judul_dokumen" value="{{ $document->judul_dokumen }}" style="margin-left:200px">
                    </div>
                    <div>
                        <label class="form-label">Deskripsi Dokumen:</label>
                        <input class="form-control" name="deskripsi_dokumen" value="{{ $document->deskripsi_dokumen }}" style="margin-left:200px">
                    </div>
                    <div style="margin-left:200px; margin-top:10px">
                        <label>Kategori Dokumen:</label>
                        <select name="kategori_dokumen" value="{{$document ->kategori_dokumen}}" class="form-control" required>
                            <option value="Dokumen visi misi">Dokumen Visi Misi</option>
                            <option value="Dokumen Tujuan">Dokumen Tujuan</option>
                            <option value="Dokumen Strategi">Dokumen Strategi</option>
                            <option value="Dokumen Tata Pamong">Dokumen Tata Pamong</option>
                            <option value="Dokumen Tata Kelola">Dokumen Tata Kelola</option>
                            <option value="Dokumen Kerjasama">Dokumen Kerjasama</option>
                            <option value="Dokumen Mahasiswa">Dokumen Mahasiswa</option>
                            <option value="Dokumen Sumber Daya Manusia">Dokumen Sumber Daya Manusia</option>
                            <option value="Dokumen Keuangan">Dokumen Keuangan</option>
                            <option value="Dokumen Sarana Prasarana">Dokumen Sarana Prasarana</option>
                            <option value="Dokumen Pendidikan">Dokumen Pendidikan</option>
                            <option value="Dokumen Penelitian">Dokumen Penelitian</option>
                            <option value="Dokumen Pengabdian Kepada Masyarakat">Dokumen Pengabdian Kepada Masyarakat</option>
                            <option value="Dokumen Iuran">Dokumen Iuran</option>
                            <option value="Dokumen Capaian Tridarma">Dokumen Capaian Tridarma</option>
                        </select>
                    </div>
                    <!-- validasi dokumen -->
                    <div>
                        <label for="tahunDokumen" class="form-label">Tahun Dokumen:</label>
                        <input type="number" class="form-control" name="tahun_dokumen" value="{{ $document->tahun_dokumen }}" id="tahunDokumen" style="margin-left:200px; position:relative; z-index: 1;" min="1900" max="2100" required>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">File Dokumen:</label>
                        <input class="form-control" type="file" id="editFile" name="edit_dokumen_file" style="margin-left:200px">
                        <div>
                            <small style="margin-left:200px">File yang sudah diunggah: {{ $document->dokumen_file}}</small>
                        </div>
                    </div>


                    <div class="form-label">
                        <div>
                            <label for="tags">Tags:</label>
                            <input type="text" id="tags" name="tags" data-role="tagsinput" class="form-control" value="{{ $document->tags }}" placeholder="Add tags">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="margin-left:200px">Update</button>
                    <a href="{{ route('list-dokumen') }}" class="btn btn-secondary" style="margin-left:10px">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
