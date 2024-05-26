@extends('layouts.app')

@section('content')
<div class="navigasi" style="margin-top: 50px;">
<div class="d-flex">
    <!-- Navigasi -->
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="position: fixed;">
        <a class="nav-link active" id="v-pills-home-tab" href="{{ route('home') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
        <a class="nav-link" id="v-pills-profile-tab" href="{{ route('input-dokumen') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Input Dokumen</a>
        <a class="nav-link" id="v-pills-messages-tab" href="{{ route('list-dokumen') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">List Dokumen</a>
        <!-- <a class="nav-link" id="v-pills-settings-tab" href="{{ route('draft-dokumen') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Draft Dokumen</a> -->

    </div>

    <!-- Konten -->
<div class="container-fluid" style="margin-left: 220px; display: flex; align-items: center; justify-content: space-around;">
    <div style="flex: 1; min-width: 0; padding-right: 20px;">
        <h1 style="font-size: 50px; font-family:'Playfair Display', serif;">SELAMAT DATANG <br>DI HALAMAN HOME!</h1> <!-- Ukuran font diperbesar -->
    </div>
    <div style="flex: 1; min-width: 0; display: flex; justify-content: center;">
        <img src="{{ asset('images/gambar.png') }}" alt="Deskripsi Gambar" style="width: auto; max-width: 110%; height: 400px;"> <!-- Tinggi gambar diatur, lebar menyesuaikan -->
    </div>
</div>

</div>

</div>

@endsection
