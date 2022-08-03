@extends('main.layouts.main')

@section('container')
    <div class="about bg-dark text-light py-4 px-3 rounded">
        <h1 class="text-light"><span class="fab fa-laravel text-danger"></span> About this Website</h1>
        <p>Web Secret Message sendiri merupakan situs penyedia layanan pesan rahasia yang memungkinkan pengguna mengirim pesan rahasia melalui link (tautan) atau bisa langsung ke menu home dan tuliskan username teman kamu lalu click masuk, nanti otomatis akan diarahkan ke halaman pesan rahasia punya teman kamu. Link tersebut bisa dibagikan ke berbagai media sosial (medsos), seperti Instagram, Facebook, Whatsapp, bahkan TikTok.</p>
        <p>Melalui link yang dibagikan itu, Anda bisa menuliskan pesan secara anonim alias tanpa nama. Sebagai contoh, Anda mengirim pesan langsung (DM) Instagram ke pengguna lain, maka penerima tidak akan mengetahui siapa pengirimnya.</p>
        <p>Web ini di buat dengan menggunakan framework Laravel 9, bagian front-end (UI) saya pakai Bootstrap 5.2 dan MDBootstrap.</p>
        <p class="fs-5 mb-0">Dukung saya dengan Saweria <i class="fas fa-grin-wink text-warning"></i></p>
        <a href="https://saweria.co/yazz803" target="_blank"><button class="btn btn-primary">Link Saweria</button></a>
    </div>

    <div class="about bg-dark text-light py-4 px-3 rounded mt-4">
        <h1 class="text-light"><span class="fa fa-star text-warning"></span> Special Feature</h1>
        <p>Kamu akan mendapatkan fitur ini ketika sudah mempunyai Special Feature!</p>
        <ul class="list-unstyled">
            <div class="d-flex">
                <span class="list far fa-check-circle text-success mt-1"></span><li class="ml-2"> Melihat Nama dan Username teman yang mengirim pesan</li>
            </div>
            <div class="d-flex">
                <span class="list far fa-check-circle text-success mt-1"></span><li class="ml-2"> Menambah/Promosi akun Media Social kamu di halaman pesan/postingan kamu sendiri</li>
            </div>
            <div class="d-flex">
                <span class="list far fa-check-circle text-success mt-1"></span><li class="ml-2"> Bisa upload gambar foto profile dan BG foto profile pakai .gif (gambar bergerak)</li>
            </div>
            <div class="d-flex">
                <span class="list fa fa-info-circle text-danger mt-1"></span><li class="ml-2"> Special 20 User pertama yang registrasi, akan mendapatkan Special Feature <strong>Gratis!</strong</li>
            </div>
        </ul>
    </div>

    <div class="about bg-dark text-light py-4 px-3 rounded fw-normal mt-4" id="specialf">
        <h1 class="text-light"><span class="fas fa-key text-primary"></span> Special Feature</h1>
        <p class="fw-normal">Untuk bisa mendapatkan Special Feature ini, kalian hanya perlu membayar 10k saja, dan itu sudah <strong>Permanen.</strong></p>
        <p class="mb-0">Cara pembeliannya (Pakai Dana) :</p>
        <ul>
            <li>Masuk ke aplikasi <strong>Dana</strong></li>
            <li>Pilih "kirim" dan masukan nomor <strong>0812-9021-5655</strong></li>
            <li>Masukan jumlah kirim sebesar <strong>Rp 10.000</strong></li>
            <li>Tulis catatan "Beli Special Feature untuk 'UsernameKamu' "</li>
            <li>Tekan "Lanjut" dan konfirmasi pembayaran</li>
            <li class="text-warning">Disarankan untuk SS transaksi/struk pembayarannya</li>
            <li>SELESAI</li>
            <li class="text-danger">Jika <strong>Special Feature</strong> belum aktif dalam waktu <strong>24jam</strong>, maka <strong>uang kamu</strong> akan dikembalikan <strong>100%</strong></li>
        </ul>
        <p>Jika ada kendala, kalian bisa langsung kirimkan pesan ke Whatsapp saya</p>
        <a href="https://wa.me/62812902156555" target="_blank"><button class="btn btn-success"><i class="fab fa-whatsapp fs-3"></i></button></a>
    </div>
@endsection