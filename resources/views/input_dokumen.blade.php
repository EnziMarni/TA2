@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
        <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
        <a class="nav-link active" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
    
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
        <!-- <a class="nav-link" id="v-pills-settings-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Draft Dokumen</a> -->
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h3 class="judul">FORM INPUT DOKUMEN</h3>
            <form action="{{ route('simpan-dokumen') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div>
                    <img src="{{ asset('images/gambar2.png') }}" alt="gambar" style="position:absolute; top:7%; left:600px; opacity:0.2; max-width: 110%; height: 600px">
                </div>
                <div>
                    <label class="form-label">Judul Dokumen:</label>
                    <input class="form-control" name="judul_dokumen" style="margin-left:200px" required>
                </div>

                <div>
                    <label class="form-label">Deskripsi Dokumen:</label>
                    <input class="form-control" name="deskripsi_dokumen" style="margin-left:200px">
                </div>

               
                <div style="margin-left:200px; margin-top:10px">
                    <label>Kategori Dokumen:</label>
                        <select name="kategori_dokumen" class="form-control" required>
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

                <div>
                    <label for="tahunDokumen" class="form-label">Tahun Dokumen:</label>
                    <input type="number" class="form-control" name="tahun_dokumen" id="tahunDokumen" style="margin-left:200px; position:relative; z-index: 1;" min="1900" max="2100" required>
                </div>


                <div class="mb-3">
                    <label for="formFile" class="form-label">Input File Dokumen:</label>
                    <input class="form-control" type="file" id="formFile" name="dokumen_file" style="margin-left:200px" required>
                </div>

                <div class="form-label">
                    <div>
                        <label for="tags">Tags:</label>
                        <input type="text" id="tags" name="tags" data-role="tagsinput" class="form-control" placeholder="Add tags" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left:200px">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
