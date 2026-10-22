@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

<style>
    .detail-berita {
        max-width: 1200px;
        margin: 0 auto;
        padding: 35px 15px 60px;
    }

    /* =========================
       LAYOUT KIRI + KANAN
    ========================= */

    .detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 35px;
        align-items: start;
    }

    .detail-main {
        min-width: 0;
    }

    .detail-sidebar {
        min-width: 0;
        position: sticky;
        top: 20px;
    }

    /* =========================
       KEMBALI
    ========================= */

    .detail-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #198754;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .detail-back:hover {
        color: #146c43;
    }

    /* =========================
       GAMBAR UTAMA
    ========================= */

    .detail-image {
        width: 100%;
        height: 470px;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        background: #f1f1f1;
    }

    /* =========================
       META
    ========================= */

    .detail-meta {
        margin-top: 18px;
        color: #777;
        font-size: 14px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px;
    }

    .detail-kategori {
        display: inline-block;
        background: #198754;
        color: white;
        padding: 5px 12px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }

    /* =========================
       JUDUL
    ========================= */

    .detail-title {
        font-size: 36px;
        line-height: 1.25;
        font-weight: 700;
        color: #222;
        margin: 15px 0 25px;
    }

    /* =========================
       ISI
    ========================= */

    .detail-content {
        color: #444;
        font-size: 16px;
        line-height: 1.9;
    }

    .detail-content p {
        margin-bottom: 18px;
    }

    .detail-content h3 {
        font-size: 23px;
        font-weight: 700;
        color: #222;
        margin-top: 30px;
        margin-bottom: 14px;
    }

    /* =========================
       PENULIS
    ========================= */

    .detail-penulis {
        margin-top: 25px;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    /* =========================
       TAGS
    ========================= */

    .detail-tags {
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #eeeeee;
    }

    .detail-tags-title {
        font-weight: 600;
        color: #444;
        margin-right: 8px;
    }

    .detail-tag {
        display: inline-block;
        color: #198754;
        margin-right: 8px;
        margin-bottom: 5px;
        font-size: 14px;
    }

    /* =========================
       SHARE
    ========================= */

    .detail-share {
        margin-top: 25px;
        padding: 18px 0;
        border-top: 1px solid #eeeeee;
        border-bottom: 1px solid #eeeeee;
    }

    .detail-share-title {
        font-weight: 600;
        margin-right: 12px;
        color: #444;
    }

    .share-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        margin-right: 6px;
        color: white;
        text-decoration: none;
        font-size: 14px;
    }

    .share-button:hover {
        color: white;
        opacity: .85;
    }

    .share-facebook {
        background: #1877f2;
    }

    .share-twitter {
        background: #111;
    }

    .share-whatsapp {
        background: #25d366;
    }

    /* =========================
       KOMENTAR
    ========================= */

    .komentar-section {
        margin-top: 35px;
    }

    .komentar-title {
        font-size: 23px;
        font-weight: 700;
        color: #222;
        margin-bottom: 25px;
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #444;
    }

    .form-control {
        border-radius: 5px;
    }

    .komentar-note {
        font-size: 12px;
        color: #999;
        margin-top: 6px;
    }

    .captcha-box {
        background: #f7f7f7;
        border: 1px solid #ddd;
        padding: 12px 15px;
        border-radius: 5px;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .btn-kirim {
        background: #198754;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 600;
    }

    .btn-kirim:hover {
        background: #146c43;
        color: white;
    }

    .belum-komentar {
        margin-top: 25px;
        padding: 20px;
        background: #f8f8f8;
        border-radius: 6px;
        color: #777;
        font-size: 14px;
    }

    /* =========================
       SIDEBAR / BERITA TERKAIT
    ========================= */

    .related-section {
        margin-top: 0;
        padding-top: 0;
        border-top: none;
    }

    .related-title {
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 22px;
        color: #222;
    }

    .related-card {
        border: 1px solid #eeeeee;
        border-radius: 7px;
        overflow: hidden;
        background: white;
        margin-bottom: 20px;
        transition: .2s;
    }

    .related-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 18px rgba(0,0,0,.08);
    }

    .related-image {
        width: 100%;
        height: 155px;
        object-fit: cover;
        display: block;
        background: #ddd;
    }

    .related-body {
        padding: 14px;
    }

    .related-body a {
        text-decoration: none;
        color: #222;
    }

    .related-body a:hover {
        color: #198754;
    }

    .related-body h5 {
        font-size: 16px;
        line-height: 1.4;
        font-weight: 600;
        margin: 0 0 10px;
    }

    .related-date {
        font-size: 12px;
        color: #999;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 991px) {

        .detail-layout {
            grid-template-columns: 1fr;
        }

        .detail-sidebar {
            position: static;
        }

        .related-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eeeeee;
        }

    }

    @media (max-width: 768px) {

        .detail-berita {
            padding-top: 20px;
        }

        .detail-image {
            height: 280px;
        }

        .detail-title {
            font-size: 27px;
        }

        .detail-content {
            font-size: 15px;
        }

    }
</style>


<div class="detail-berita">

    {{-- =========================
         KEMBALI
    ========================== --}}
    <a href="{{ route('berita.index') }}" class="detail-back">
        ← Kembali ke Daftar
    </a>


    {{-- =========================
         LAYOUT KIRI + KANAN
    ========================== --}}
    <div class="detail-layout">


        {{-- ==================================================
             KOLOM KIRI
        =================================================== --}}
        <main class="detail-main">


            {{-- GAMBAR UTAMA --}}
            @if($berita->gambar)

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    class="detail-image"
                >

            @else

                <img
                    src="https://placehold.co/1200x600?text=Berita+Desa"
                    alt="{{ $berita->judul }}"
                    class="detail-image"
                >

            @endif


            {{-- META --}}
            <div class="detail-meta">

                <span class="badge badge-kategori text-white">
    {{ $berita->kategori->nama }}
</span>

                <span>•</span>

                <span>
                    {{ $berita->created_at->format('d M Y') }}
                </span>

                @if($berita->penulis)

                    <span>•</span>

                    <span>
                        {{ $berita->penulis }}
                    </span>

                @endif

                <span>•</span>

                {{-- JUMLAH DIBACA MILIK DATABASE SENDIRI --}}
                <span>
                    <i class="bi bi-eye"></i>
                    {{ $berita->dilihat }} dibaca
                </span>

            </div>


           
{{-- JUDUL --}}
<h2 class="mt-3">
    {{ $berita->judul }}
</h2>

{{-- TAG --}}
<div class="mb-3">
    @foreach ($berita->tags as $tag)
        <a href="{{ route('berita.index', ['tag' => $tag->id]) }}"
           class="tag-pill text-decoration-none">#{{ $tag->nama }}</a>
    @endforeach
</div>

{{-- ISI BERITA --}}
<div class="detail-content">
    {!! nl2br(e($berita->isi)) !!}
</div>



            {{-- PENULIS --}}
            @if($berita->penulis)

                <div class="detail-penulis">
                    {{ $berita->penulis }}
                </div>

            @endif




            {{-- BAGIKAN --}}
            <div class="detail-share">

                <span class="detail-share-title">
                    Bagikan:
                </span>

                <a
                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                    target="_blank"
                    class="share-button share-facebook"
                    title="Bagikan ke Facebook"
                >
                    <i class="bi bi-facebook"></i>
                </a>

                <a
                    href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->judul) }}"
                    target="_blank"
                    class="share-button share-twitter"
                    title="Bagikan ke Twitter"
                >
                    <i class="bi bi-twitter-x"></i>
                </a>

                <a
                    href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->fullUrl()) }}"
                    target="_blank"
                    class="share-button share-whatsapp"
                    title="Bagikan ke WhatsApp"
                >
                    <i class="bi bi-whatsapp"></i>
                </a>

            </div>


            {{-- KOMENTAR --}}
            <div class="komentar-section">

                <h3 class="komentar-title">
                    Komentar (0)
                </h3>

                <h6 class="mb-4">
                    Tulis Komentar Anda:
                </h6>


                <form>

                    <div class="row">

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Nama Lengkap *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Nama Anda"
                            >

                        </div>


                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Alamat Email *
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                placeholder="nama@email.com"
                            >

                            <div class="komentar-note">
                                Privat
                            </div>

                        </div>


                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Nomor HP *
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                placeholder="08xxxxxxxxxx"
                            >

                            <div class="komentar-note">
                                Privat
                            </div>

                        </div>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Pesan Komentar *
                        </label>

                        <textarea
                            class="form-control"
                            rows="5"
                            maxlength="300"
                            placeholder="Tulis komentar Anda..."
                        ></textarea>

                        <div class="komentar-note">
                            Dilarang menggunakan kata kasar / ujaran kebencian.
                            300 karakter tersisa
                        </div>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Pertanyaan Keamanan (Captcha Anti-Bot) *
                        </label>

                        <div class="captcha-box">
                            8 + 7 = ?
                        </div>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Jawaban"
                        >

                    </div>


                    <button
                        type="button"
                        class="btn-kirim"
                    >
                        Kirim Komentar
                    </button>

                </form>


                <div class="belum-komentar">
                    Belum ada komentar.
                    Jadilah yang pertama memberikan masukan!
                </div>

            </div>


        </main>


        {{-- ==================================================
             KOLOM KANAN - BERITA TERKAIT
        =================================================== --}}
        <aside class="detail-sidebar">

            <div class="related-section">

                <h3 class="related-title">
                    Berita Terkait
                </h3>


                @foreach(
                    \App\Models\Berita::where('id', '!=', $berita->id)
                        ->latest()
                        ->take(3)
                        ->get()
                    as $related
                )


                    <div class="related-card">


                        {{-- GAMBAR BERITA TERKAIT --}}
                        @if($related->gambar)

                            <img
                                src="{{ asset('storage/' . $related->gambar) }}"
                                alt="{{ $related->judul }}"
                                class="related-image"
                            >

                        @else

                            <img
                                src="https://placehold.co/600x350?text=Berita+Desa"
                                alt="{{ $related->judul }}"
                                class="related-image"
                            >

                        @endif


                        {{-- INFORMASI BERITA --}}
                        <div class="related-body">

                            <a href="{{ route('berita.show', $related) }}">

                                <h5>
                                    {{ \Illuminate\Support\Str::limit($related->judul, 80) }}
                                </h5>

                            </a>

                            <div class="related-date">
                                {{ $related->created_at->format('d M Y') }}
                            </div>

                        </div>


                    </div>


                @endforeach


            </div>

        </aside>


    </div>

</div>

@endsection