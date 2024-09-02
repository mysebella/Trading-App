@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Security',
        'path' => ['Home', 'Security'],
    ])
    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">

        @if ($user->twoFactorCode)
            <div class="w-full">
                <div class="bg-black rounded-lg overflow-hidden">
                    <div class="p-6 text-white/70 border-b border-white/25">
                        <p>Persiapan Two Factor</p>
                    </div>
                    @include('components.verified', [
                        'label' => '2FA Enabled',
                        'description' => '2FA Kamu berhasil di aktifkan',
                    ])
                </div>
            </div>
        @else
            <div class="w-full">
                <div class="bg-black rounded-lg overflow-hidden">
                    <div class="p-6 text-white/70 border-b border-white/25">
                        <p>Persiapan Two Factor</p>
                    </div>
                    <div class="text-white/70 p-6 text-sm">
                        <p>Untuk Mempersiapkan 2FA pertama kamu harus Download Google Authenticator:</p>

                        <div class="my-4 flex flex-col">
                            <a href="" class="hover:text-blue-400">
                                <i class="bi bi-android2"></i>
                                Google Authenticator for Android (PlayStore)
                            </a>
                            <a href="" class="hover:text-blue-400 mt-4">
                                <i class="bi bi-apple"></i>
                                Google Authenticator for iOS (Apple App Store)
                            </a>
                        </div>

                        <p>
                            Kemudian scan code di bawah atau, jika kamu tidak ingin scan barcode, kamu bisa memasukan
                            "security key" secara manual
                        </p>

                        <p class="text-2xl mt-4">
                            Security Key: <span class="text-blue-400"> {{ $secretkey }} </span>(Code Berdasarkan Waktu)
                        </p>

                        <div class="my-4">
                            {!! $qrcode !!}
                        </div>

                        <p class="lmy-2">
                            Masukan 6 digit code yang di buat oleh Google Authenticator di 2FA Code box dan klik "Aktifkan
                            Two-Factor" untuk mengaktifkan
                        </p>

                        <p class="my-6 lg:my-4">
                            <span class="bg-red-500 px-2 text-white rounded-md">Penting</span>
                            Simpan kode rahasia ini untuk referensi di masa mendatang
                        </p>

                        <p class="my-2">
                            Catatan: Akun Google tidak butuhkan untuk mengunakan Google Authenticator; Lewati Google login
                        </p>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div class="w-full rounded-lg overflow-hidden bg-black">
                    <div class="p-6 text-white/70 border-b border-white/25">
                        <p>Keamanan Akun</p>
                    </div>
                    <div class="text-white/70 p-6 text-sm">
                        <p class="mb-6 lg:mb-0">Autentikasi Two Factor</p>
                        <form action="{{ route('security.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="lg:p-4">
                                <div>
                                    <label class="text-white/70" for="email">Aktifkan 2FA</label> <br />
                                    <select
                                        class="bg-background outline-none p-3 mb-2 border border-white/30 w-full rounded-lg mt-2 h-[50px]">
                                        <option {{ !$user->twoFactorCode ? 'selected' : '' }}>OFF</option>
                                        <option {{ $user->twoFactorCode ? 'selected' : '' }}>ON</option>
                                    </select>
                                </div>

                                <div class="mt-2">
                                    @include('components.input-icon', [
                                        'label' => 'Masukan Kode 2FA',
                                        'name' => 'twoFactorCode',
                                        'icon' => '<i class="fa fa-qrcode fa-lg"></i>',
                                    ])
                                </div>

                                <button class="bg-orange p-3 rounded-lg w-full text-black mt-4">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="w-full rounded-lg overflow-hidden bg-black my-6">
                    <div class="p-6 text-white/70 border-b border-white/25">
                        <p>Cara Google Authenticator</p>
                    </div>
                    <div class="text-white/70 p-6 text-sm">
                        <ul class="list-decimal px-6">
                            <li>Pasang Google Authenticator untuk Android atau Apple dan buka aplikasi Google Authenticator
                            </li>
                            <li>Masuk ke <span class="text-red-400">Menu</span> -> <span class="text-red-400">Pengaturan
                                    Akun</span></li>
                            <li>Pilih opsi <span class="text-red-400">Pindai kode batang</span>, dan pindai kode batang yang
                                ditampilkan di halaman ini</li>
                            <li>Jika Anda tidak dapat memindai kode batang: Pilih <span class="text-red-400">Masukkan kunci
                                    yang diberikan</span> dan ketik "Kunci Keamanan"</li>
                            <li>Sebuah angka enam digit akan muncul di layar beranda aplikasi Google Authenticator Anda,
                                masukkan kode ini</li>
                            <li>ke formulir 2FA di halaman ini</li>
                            <li>Setiap kali Anda masuk ke HSB FOREX TRADE, Anda harus memasukkan kode 2FA baru dari Google
                                Authenticator Anda</li>
                            <li>ke kotak 2FA pada formulir login</li>
                            <li>Hubungi administrator jika Anda ingin mengatur ulang Google Authenticator 2FA Anda.</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif

    </section>
@endsection
