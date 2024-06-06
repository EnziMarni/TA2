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
            <h3 style="margin-left:200px;" class="judul">List Dokumen</h3>
            <!-- Icon search dan filter -->
            <div style="margin-left:200px; margin-bottom: 10px; display: flex; align-items:center;">
                <div style="position: relative; width:500px">
                    <input type="text" class="form-control" placeholder="Search" id="search" style="padding-right: 30px;">
                    <span style="position: absolute; top: 50%; transform: translateY(-50%); right: 10px; cursor: pointer;" id="searchIcon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </div>
                <div style="position: relative; margin-left:100px">
                    <select name="filter" class="form-control" id="filter" style="width:500px;">
                        <option value="all">All</option>
                        <option value="Dokumen Visi Misi">Dokumen Visi Misi</option>
                        <option value="Dokumen Tujuan">Dokumen Tujuan</option>
                        <option value="Dokumen Strategi">Dokumen Strategi</option> <!-- Menambahkan opsi "Strategi" -->
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
                        <th scope="col">Validasi Dokumen</th>
                        <th scope="col">Tahun Dokumen</th>
                        <th scope="col">File</th>                                
                        <th scope="col">Tags</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="documentTableBody">
                    @foreach($documents as $index => $document)
                    <tr data-category="{{ $document->kategori_dokumen }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $document->judul_dokumen }}</td>
                        <td>{{ $document->deskripsi_dokumen }}</td>
                        <td>{{ $document->kategori_dokumen }}</td>                                
                        <td>{{$document->validasi_dokumen}}</td>
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
                            <form action="{{ route('dokumen.moveToDraft', $document->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('POST') 
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

<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk melakukan pencarian berdasarkan judul dokumen dan tag
    function searchByTitleAndTag() {
        // Mendapatkan nilai input pencarian
        var query = document.getElementById('search').value.trim().toLowerCase();
        
        // Mendapatkan semua baris dalam tabel
        var rows = document.querySelectorAll('#documentTableBody tr');

        // Iterasi melalui setiap baris dalam tabel
        rows.forEach(function(row) {
            // Mendapatkan teks judul dokumen dan tag dalam baris saat ini
            var title = row.cells[1].textContent.trim().toLowerCase();
            var tags = row.cells[7].textContent.toLowerCase();
            var tagArray = tags.split(',').map(tag => tag.trim()); // Memecah string tags menjadi array dan trim setiap tag

            // Memeriksa apakah judul dokumen atau salah satu tag mengandung kata kunci pencarian
            var matchFound = title.includes(query) || tagArray.some(tag => tag.includes(query));

            if (matchFound) {
                // Jika iya, tampilkan baris
                row.style.display = '';
            } else {
                // Jika tidak, sembunyikan baris
                row.style.display = 'none';
            }
        });

        // Log ke konsol setelah pencarian selesai
        console.log('Pencarian selesai. Hasil yang ditampilkan:', query);
    }

    // Event listener untuk menangani pencarian saat tombol atau input diketik
    document.getElementById('search').addEventListener('input', function() {
        searchByTitleAndTag();
    });

    // Event listener untuk menangani pencarian saat tombol search di klik
    document.getElementById('searchIcon').addEventListener('click', function() {
        searchByTitleAndTag();
    });
     // Fungsi untuk melakukan filter berdasarkan kategori dokumen
     function filterByCategory() {
        var selectedCategory = document.getElementById('filter').value.toLowerCase();
        var rows = document.querySelectorAll('#documentTableBody tr');

        rows.forEach(function(row) {
            var category = row.dataset.category.toLowerCase();

            if (selectedCategory === 'all' || category === selectedCategory) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        console.log('Filtering by category:', selectedCategory);
    }

    // Event listener untuk pencarian
    document.getElementById('search').addEventListener('input', function() {
        searchByTitleAndTag();
    });

    document.getElementById('searchIcon').addEventListener('click', function() {
        searchByTitleAndTag();
    });

    // Event listener untuk filter
    document.getElementById('filter').addEventListener('change', function() {
        filterByCategory();
    });
});

</script>
@endsection