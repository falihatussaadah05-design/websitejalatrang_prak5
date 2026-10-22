@extends('layouts.app')

@section('title', 'Berita & Informasi')

@section('content')

<style>

/* =========================================================
   HALAMAN BERITA
========================================================= */

    .berita-page {
    background: #ffffff;
    min-height: 100vh;
    padding-bottom: 70px;
}


/* =========================================================
   HERO / HEADER
========================================================= */

    .berita-header {
    width: 100vw;
    margin-left: calc(50% - 50vw);

    background: linear-gradient(
        135deg,
        #172033 0%,
        #1d3557 55%,
        #1769aa 100%
    );

    padding: 42px 30px 45px;
    color: white;
}

    .berita-header-inner {
    max-width: 1200px;
    margin: 0 auto;
}

    .berita-breadcrumb {
    display: flex;
    align-items: center;
    margin-bottom: 22px;
    font-size: 14px;
}

    .berita-breadcrumb .beranda {
    color: #ffc400;
    font-weight: 600;
}

    .berita-breadcrumb .slash {
    color: rgba(255,255,255,.45);
    margin: 0 9px;
}

    .berita-breadcrumb .berita {
    color: #ffffff;
}

    .berita-title {
    margin: 0 0 9px;
    color: #ffffff;
    font-size: 38px;
    line-height: 1.2;
    font-weight: 800;
}

    .berita-subtitle {
    margin: 0;
    color: rgba(255,255,255,.78);
    font-size: 16px;
}


/* =========================================================
   KONTEN UTAMA
========================================================= */

    .berita-container {
    width: 100%;
    max-width: 1450px;

    margin: 0 auto;
    padding: 40px 35px;

    display: grid;
    grid-template-columns: 280px minmax(0, 1fr);
    gap: 30px;

    align-items: start;
}

    .berita-container > .filter-box {
    grid-column: 1;
}

    .berita-container > .row {
    grid-column: 2;
    min-width: 0;
}


/* =========================================================
   FILTER BERITA
========================================================= */

    .filter-box {
    width: 100%;
    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 8px;

    overflow: hidden;
    margin-bottom: 30px;

    box-shadow: 0 3px 12px rgba(17,24,39,.07);
}

    .filter-header {
    background: #172033;
    color: #ffffff;

    padding: 14px 18px;

    font-size: 15px;
    font-weight: 700;
}

    .filter-header i {
    color: #ffc400;
}

    .filter-body {
    padding: 20px;
}

    .filter-body label {
    display: block;

    color: #374151;
    font-size: 13px;
    font-weight: 600;

    margin-bottom: 7px;
}

    .filter-body .form-control,
    .filter-body .form-select {
    min-height: 42px;

    border: 1px solid #d9dee7;
    border-radius: 6px;

    color: #374151;
    font-size: 13px;

    box-shadow: none;
}

    .filter-body .form-control:focus,
    .filter-body .form-select:focus {
    border-color: #1e88e5;

    box-shadow:
        0 0 0 .15rem rgba(30,136,229,.12);
}


/* =========================================================
   TOMBOL CARI
========================================================= */

    .btn-cari {
    min-height: 42px;

    background: #1e88e5;
    color: #ffffff;

    border: 1px solid #1e88e5;
    border-radius: 6px;

    font-size: 13px;
    font-weight: 600;
}

    .btn-cari:hover {
    background: #1769aa;
    border-color: #1769aa;
    color: #ffffff;
}


/* =========================================================
   TOMBOL RESET
========================================================= */

    .btn-reset {
    min-height: 42px;

    background: #ffffff;
    color: #4b5563;

    border: 1px solid #d1d5db;
    border-radius: 6px;

    font-size: 13px;
    font-weight: 500;
}

    .btn-reset:hover {
    background: #f3f4f6;
    color: #111827;
}


/* =========================================================
   TOMBOL TAMBAH BERITA
========================================================= */

    .btn-tambah-berita {
    background: #2196F3;

    border: none;
    color: white;

    padding: 12px 15px;

    border-radius: 8px;

    font-weight: 600;

    transition: 0.2s;
}

    .btn-tambah-berita:hover {
    background: #1976D2;
    color: white;
}

    .btn-tambah-berita i {
    margin-right: 6px;
}


/* =========================================================
   GRID BERITA
========================================================= */

    .berita-grid {
    margin-left: -10px;
    margin-right: -10px;
}

    .berita-column {
    padding-left: 10px;
    padding-right: 10px;

    margin-bottom: 25px;
}


/* =========================================================
   CARD BERITA
========================================================= */

    .card-berita {
    width: 100%;
    height: 100%;

    background: #ffffff;

    border: 1px solid #e5e7eb;
    border-radius: 8px;

    overflow: hidden;

    display: flex;
    flex-direction: column;

    box-shadow: 0 3px 12px rgba(17,24,39,.06);

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

    .card-berita:hover {
    transform: translateY(-3px);

    box-shadow:
        0 9px 24px rgba(17,24,39,.12);
}


/* =========================================================
   GAMBAR
========================================================= */

    .card-berita .card-img-top {
    width: 100%;
    height: 205px;

    object-fit: cover;

    display: block;

    background: #f3f4f6;
}


/* =========================================================
   BODY CARD
========================================================= */

    .card-berita .card-body {
    padding: 17px;

    display: flex;
    flex-direction: column;

    flex: 1;
}


/* =========================================================
   KATEGORI + TANGGAL
========================================================= */

    .info-berita {
    display: flex;
    align-items: center;

    gap: 8px;

    margin-bottom: 10px;
}

    .badge-kategori {
    display: inline-block;

    background: #e8f2fd;
    color: #1769aa;

    padding: 4px 9px;

    border-radius: 4px;

    font-size: 10px;
    font-weight: 700;

    text-transform: capitalize;

    white-space: nowrap;
}

    .tanggal-berita {
    color: #8a929e;

    font-size: 11px;

    white-space: nowrap;
}

    .tanggal-berita i {
    margin-right: 3px;
}


/* =========================================================
   JUDUL BERITA
========================================================= */

    .judul-berita {
    color: #20252d;

    font-size: 16px;
    font-weight: 700;

    line-height: 1.45;

    margin-bottom: 9px;

    min-height: 46px;

    transition: .2s ease;
}

    .judul-berita:hover {
    color: #1769aa;
}


/* =========================================================
   ISI / RINGKASAN
========================================================= */

    .isi-berita {
    color: #6b7280;

    font-size: 12.5px;

    line-height: 1.6;

    margin-bottom: 12px;

    min-height: 60px;
}


/* =========================================================
   TAG
========================================================= */

    .tag-container {
    min-height: 26px;

    margin-bottom: 12px;
}

    .tag-pill {
    display: inline-block;

    background: #f8f9fa;
    color: #6b7280;

    padding: 4px 8px;

    margin-right: 5px;
    margin-bottom: 3px;

    border: 1px solid #dfe3e8;

    border-radius: 6px;

    font-size: 11px;
    font-weight: 500;
}


/* =========================================================
   FOOTER CARD
========================================================= */

    .card-footer-berita {
    margin-top: auto;

    padding-top: 11px;

    border-top: 1px solid #edf0f3;

    display: flex;

    justify-content: space-between;
    align-items: center;

    gap: 8px;
}

    .jumlah-dilihat {
    color: #8a929e;

    font-size: 11px;

    white-space: nowrap;
}

    .jumlah-dilihat i {
    margin-right: 3px;
}


/* =========================================================
   TOMBOL AKSI
========================================================= */

    .aksi-berita {
    display: flex;

    align-items: center;

    gap: 5px;
}

    .btn-aksi {
    width: 30px;
    height: 30px;

    padding: 0;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 5px;

    font-size: 12px;
}

    .btn-edit {
    background: #ffc107;
    color: #212529;

    border: 1px solid #ffc107;
}

    .btn-edit:hover {
    background: #e0a800;
    color: #212529;
}

    .btn-hapus {
    background: #dc3545;
    color: #ffffff;

    border: 1px solid #dc3545;
}

    .btn-hapus:hover {
    background: #bb2d3b;
    color: #ffffff;
}

    .btn-baca {
    display: inline-flex;

    align-items: center;

    gap: 4px;

    background: #1e88e5;
    color: #ffffff;

    border: none;

    border-radius: 5px;

    padding: 6px 10px;

    font-size: 11px;
    font-weight: 600;

    transition: .2s ease;

    text-decoration: none;

    white-space: nowrap;
}

    .btn-baca:hover {
    background: #1769aa;
    color: #ffffff;
}


/* =========================================================
   BERITA KOSONG
========================================================= */

    .berita-kosong {
    padding: 60px 20px;

    text-align: center;

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 8px;
}

    .berita-kosong i {
    color: #1e88e5;

    font-size: 40px;
}

    .berita-kosong p {
    color: #6b7280;

    margin: 12px 0 0;

    font-size: 14px;
}


/* =========================================================
   PAGINATION
========================================================= */

    .pagination-wrapper {
    grid-column: 1 / -1 !important;

    width: 100% !important;

    margin-top: 15px;

    padding-top: 15px;

    display: flex !important;

    justify-content: center !important;

    align-items: center !important;
}

    .pagination-wrapper nav {
    width: auto !important;

    margin: 0 auto !important;
}

    .pagination-wrapper nav > div.d-sm-none {
    display: none !important;
}

    .pagination-wrapper nav > div.d-sm-flex {
    display: flex !important;

    flex-direction: row !important;

    align-items: center !important;

    justify-content: center !important;

    width: auto !important;

    gap: 30px !important;
}

    .pagination-wrapper nav > div.d-sm-flex > div:first-child {
    width: auto !important;

    flex: none !important;

    margin: 0 !important;
}

    .pagination-wrapper nav > div.d-sm-flex > div:last-child {
    width: auto !important;

    flex: none !important;

    margin: 0 !important;
}

    .pagination {
    margin-bottom: 0;
}

    .pagination .page-link {
    color: #1769aa;

    border-color: #dfe4ea;

    font-size: 12px;

    min-width: 34px;

    text-align: center;
}

    .pagination .page-link:hover {
    background: #eef6fd;

    color: #1769aa;
}

    .pagination .page-item.active .page-link {
    background: #1e88e5;

    border-color: #1e88e5;

    color: #ffffff;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .berita-title {
        font-size: 34px;
    }

    .card-berita .card-img-top {
        height: 195px;
    }
}


@media (max-width: 767px) {

    .berita-header {
        padding: 35px 20px 38px;
    }

    .berita-title {
        font-size: 29px;
    }

    .berita-subtitle {
        font-size: 14px;
    }

    .berita-container {
        padding-top: 25px;
    }

    .filter-body {
        padding: 16px;
    }

    .card-berita .card-img-top {
        height: 210px;
    }

    .card-footer-berita {
        align-items: flex-start;
        flex-direction: column;
    }

    .aksi-berita {
        width: 100%;
        justify-content: flex-end;
    }
}


@media (max-width: 575px) {

    .berita-breadcrumb {
        font-size: 12px;
    }

    .berita-title {
        font-size: 26px;
    }

    .berita-subtitle {
        font-size: 13px;
    }
}


/* =========================================================
   FILTER SIDEBAR - VERTIKAL
========================================================= */

    .filter-box {
    width: 100% !important;
}

    .filter-box .filter-body {
    width: 100% !important;

    padding: 25px !important;

    box-sizing: border-box !important;
}

    .filter-box .filter-body form .row {
    display: block !important;

    margin: 0 !important;
}

    .filter-box .filter-body form .row > [class*="col-"] {
    width: 100% !important;

    max-width: 100% !important;

    flex: none !important;

    padding: 0 !important;

    margin-bottom: 20px !important;
}

    .filter-box .filter-body .form-label {
    display: block !important;

    width: 100% !important;

    margin-bottom: 8px !important;
}

    .filter-box .filter-body .form-control,
    .filter-box .filter-body .form-select {
    display: block !important;

    width: 100% !important;

    max-width: 100% !important;

    height: 48px !important;

    box-sizing: border-box !important;
}

    .filter-box .filter-body .btn,
    .filter-box .filter-body button,
    .filter-box .filter-body a {
    box-sizing: border-box !important;
}


/* =========================================================
   TOMBOL FILTER
========================================================= */

    .filter-box .filter-body .d-flex,
    .filter-box .filter-body .d-grid {
    width: 100% !important;
}

    .filter-box .filter-body .d-flex > *,
    .filter-box .filter-body .d-grid > * {
    width: 100% !important;

    margin-bottom: 10px !important;
}

</style>


<div class="berita-page">


    {{-- =====================================================
         HEADER BERITA
    ====================================================== --}}

    <section class="berita-header">

        <div class="berita-header-inner">

            <div class="berita-breadcrumb">

                <span class="beranda">
                    Beranda
                </span>

                <span class="slash">
                    /
                </span>

                <span class="berita">
                    Berita
                </span>

            </div>


            <h1 class="berita-title">
                Berita & Informasi
            </h1>


            <p class="berita-subtitle">
                Informasi terkini dari Desa Jalatrang
            </p>

        </div>

    </section>



    {{-- =====================================================
         CONTENT
    ====================================================== --}}

    <div class="berita-container">


        {{-- =================================================
             FILTER
        ================================================== --}}

        <div class="filter-box">

            <div class="filter-header">

                <i class="bi bi-funnel-fill me-1"></i>

                Filter Berita

            </div>


            <div class="filter-body">

                <form
                    method="GET"
                    action="{{ route('berita.index') }}"
                >

                    <div class="row align-items-end g-3">


                        {{-- KATA KUNCI --}}

                        <div class="col-lg-5 col-md-5">

                            <label for="kata_kunci">
                                Kata Kunci
                            </label>

                            <input
                                type="text"
                                name="kata_kunci"
                                id="kata_kunci"
                                class="form-control"
                                value="{{ request('kata_kunci') }}"
                                placeholder="Cari berita..."
                            >

                        </div>



                        {{-- KATEGORI --}}

                        <div class="col-lg-3 col-md-3">

                            <label for="kategori">
                                Kategori
                            </label>

                            <select name="kategori" class="form-select mb-3">
    <option value="">Semua Kategori</option>
    @foreach ($kategoris as $k)
        <option value="{{ $k->id }}" @selected(request('kategori') == $k->id)>{{ $k->nama }}</option>
    @endforeach
</select>


                        </div>



                        {{-- CARI --}}

                        <div class="col-lg-2 col-md-2">

                            <button
                                type="submit"
                                class="btn btn-cari w-100"
                            >

                                <i class="bi bi-search me-1"></i>

                                Cari

                            </button>

                        </div>



                        {{-- RESET --}}

                        <div class="col-lg-2 col-md-2">

                            <a
                                href="{{ route('berita.index') }}"
                                class="btn btn-reset w-100"
                            >
                                Reset
                            </a>

                        </div>

                    </div>

                </form>



                {{-- TAMBAH BERITA --}}

                <div class="mt-3">

                    <a
                        href="{{ route('berita.create') }}"
                        class="btn btn-tambah-berita w-100"
                    >

                        <i class="bi bi-plus-lg"></i>

                        Tambah Berita

                    </a>

                </div>

            </div>

        </div>



        {{-- =================================================
             GRID BERITA
        ================================================== --}}

        <div class="row berita-grid">


            @forelse ($beritas as $berita)


                <div class="col-xl-4 col-md-6 berita-column">


                    <div class="card-berita">


                        {{-- =================================================
                             GAMBAR
                        ================================================== --}}

                        <img
                            src="{{ $berita->gambar
                                ? asset('storage/' . $berita->gambar)
                                : 'https://placehold.co/600x400?text=Berita+Desa' }}"
                            class="card-img-top"
                            alt="{{ $berita->judul }}"
                        >



                        <div class="card-body">


                            {{-- KATEGORI + TANGGAL --}}

                            <div class="info-berita">

                               <span class="badge badge-kategori text-white">{{ $berita->kategori->nama }}</span>


                                <span class="tanggal-berita">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $berita->created_at->format('d M Y') }}

                                </span>

                            </div>



                            {{-- JUDUL --}}

                            <a
                                href="{{ route('berita.show', $berita) }}"
                                class="text-decoration-none"
                            >

                                <div class="judul-berita">

                                    {{ Str::limit($berita->judul, 75) }}

                                </div>

                            </a>



                            {{-- RINGKASAN --}}

                            <p class="isi-berita">

                                JalatrangNews;

                                {{ Str::limit(strip_tags($berita->isi), 105) }}

                            </p>



                            {{-- TAG --}}

                            <div class="mb-2">
    @foreach ($berita->tags as $tag)
        <a href="{{ route('berita.index', ['tag' => $tag->id]) }}"
           class="tag-pill text-decoration-none">#{{ $tag->nama }}</a>
    @endforeach
</div>




                            {{-- =================================================
                                 FOOTER CARD
                            ================================================== --}}

                            <div class="card-footer-berita">


                                {{-- JUMLAH DILIHAT --}}

                                <span class="jumlah-dilihat">

                                    <i class="bi bi-eye"></i>

                                    {{ $berita->dilihat }}

                                    Baca

                                </span>



                                {{-- TOMBOL AKSI --}}

                                <div class="aksi-berita">


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('berita.edit', $berita) }}"
                                        class="btn btn-aksi btn-edit"
                                        title="Edit berita"
                                    >

                                        <i class="bi bi-pencil"></i>

                                    </a>



                                    {{-- HAPUS --}}

                                    <form
                                        action="{{ route('berita.destroy', $berita) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn btn-aksi btn-hapus"
                                            title="Hapus berita"
                                        >

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>



                                    {{-- BACA --}}

                                    <a
                                        href="{{ route('berita.show', $berita) }}"
                                        class="btn-baca"
                                    >

                                        Baca

                                        <i class="bi bi-arrow-right"></i>

                                    </a>


                                </div>


                            </div>


                        </div>

                    </div>

                </div>


            @empty


                <div class="col-12">

                    <div class="berita-kosong">

                        <i class="bi bi-newspaper"></i>

                        <p>
                            Berita tidak ditemukan.
                        </p>

                    </div>

                </div>


            @endforelse


        </div>



        {{-- =================================================
             PAGINATION
        ================================================== --}}

        @if ($beritas->hasPages())

            <div class="pagination-wrapper d-flex justify-content-center">

                {{ $beritas->links() }}

            </div>

        @endif


    </div>

</div>

@endsection