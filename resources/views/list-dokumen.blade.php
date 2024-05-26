@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top:50px">
    <div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position:fixed">
        <a class="nav-link" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
        <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
    
        <a class="nav-link active" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
       
    </div>
    <div class="tab-content" id="v-pills-tabContent">
                <h3 style="margin-left:200px; test-align:center">List Dokumen</h3>
                <!-- Icon search dan filter -->
                <div style="margin-left:200px; margin-bottom: 10px; display: flex; align-items:center;">
                    <div style="position: relative; width:500px">
                        <input type="text" class="form-control" placeholder="Search" style="padding-right: 30px;">
                        <span style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px;">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div style="position: relative; margin-left:100px">
                        <select name="filter" class="form-control" style="width:500px;">
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
                        <span style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px;">
                            <i class="fa fa-filter" aria-hidden="true"></i>
                        </span>
                    </div>
            </div>
                <!-- Table Daftar Dokumen -->
                    <table class="table" style="margin-left:200px;overflow: hidden; max-width: 87%;">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Dokumen</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tahun Dokumen</th>
                            <th scope="col">File</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Aksi</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $index => $document)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $document->judul_dokumen }}</td>
                                <td>{{ $document->deskripsi_dokumen }}</td>
                                <td>{{ $document->kategori_dokumen }}</td>
                                <td>{{ $document->tahun_dokumen}}</td>
                                <td>
                                    <a href="{{ asset('storage/documents/' . $document->dokumen_file) }}" target="_blank">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>{{ $document->tags}}</td>
                                <td>
                                    <a href="{{ route('dokumen.edit', $document->id) }}">
                                        <i class="fa fa-edit" aria-hidden="true" style="color: blue;"></i>
                                    </a>
                                    <a href="{{ asset('storage/documents/' . $document->dokumen_file) }}" class="btn btn-link" download>
                                        <i class="fa fa-download"></i>
                                    </a>
                                    <!-- Icon untuk delete -->
                                    <form action="{{ route('dokumen.destroy', $document->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                            <i class="fa fa-trash" aria-hidden="true" style="color: red;"></i>
                                        </button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection