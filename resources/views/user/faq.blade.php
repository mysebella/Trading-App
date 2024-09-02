@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Pertanyaan yang Sering Diajukan (FAQ)',
        'path' => ['Beranda', 'FAQ'],
    ])

    <section class="mt-4 w-full overflow-hidden rounded-lg text-sm text-white/80">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-4 lg:p-6 overflow-x-scroll">
                <div class="bg-background rounded-lg p-4">
                    @include('components.faq-item', [
                        'label' => 'Apa saja biaya tambahan?',
                        'description' => 'Tidak ada biaya tambahan yang dikenakan.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Kapan pasar dibuka untuk investasi perdagangan?',
                        'description' =>
                            'Pasar forex buka 24 jam setiap hari di beberapa bagian dunia, dari pukul 5 sore EST pada hari Minggu hingga pukul 4 sore EST pada hari Jumat. Fleksibilitas forex untuk perdagangan investasi selama 24 jam sebagian disebabkan oleh zona waktu internasional yang berbeda.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara mengelola risiko saya?',
                        'description' =>
                            'Limit order dan stop-loss order adalah alat manajemen risiko yang paling umum dalam Investasi Perdagangan Forex. Limit order membantu membatasi harga minimum yang akan diterima atau harga maksimum yang akan dibayar. Stop-loss order digunakan untuk menetapkan posisi agar dilikuidasi secara tidak sengaja pada harga tertentu untuk membatasi kemungkinan kerugian jika pasar bergerak melawan posisi investor.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Jenis akun apa yang Anda tawarkan?',
                        'description' =>
                            'Kami memiliki berbagai jenis akun. Anda dapat menjelajahi jenis akun di sini dan memilih yang sesuai dengan Anda.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apakah ada volume perdagangan investasi minimum?',
                        'description' =>
                            'Anda dapat berdagang dengan hanya beberapa dolar menggunakan akun mikro kami.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apa itu spread?',
                        'description' => 'Spread adalah selisih antara harga bid dan ask dari mata uang dasar.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara membuka akun investasi perdagangan?',
                        'description' =>
                            'Anda dapat membuka dua jenis akun - akun demo dan akun live. Dalam akun demo, Anda akan mendapatkan uang virtual yang dapat Anda gunakan untuk berdagang dan belajar secara virtual. Dalam akun live, pertama-tama Anda perlu menyetor dana untuk berdagang.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara login ke platform investasi perdagangan?',
                        'description' =>
                            'Setelah mendaftar, Anda akan mendapatkan nama pengguna dan kata sandi yang dapat Anda gunakan untuk masuk ke akun Anda.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apakah dokumen diperlukan untuk membuka akun dengan Daxtradefx?',
                        'description' =>
                            'Untuk membuka akun, dokumen berikut akan diperlukan: <br/> - Bukti identitas seperti paspor atau SIM. <br/> - Bukti tempat tinggal',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Berapa banyak akun yang dapat saya buka?',
                        'description' =>
                            'Daxtradefx menawarkan tiga mata uang dasar di mana Anda dapat berdagang. Anda dapat memiliki beberapa akun untuk setiap mata uang dasar.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Leverage apa yang diterapkan pada akun saya?',
                        'description' => 'Akun Anda dapat memiliki leverage maksimum 1:1000.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara memverifikasi akun saya?',
                        'description' => 'Bagaimana cara memverifikasi akun saya?',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara membuka akun?',
                        'description' =>
                            'Untuk membuka akun dengan Daxtradefx, Anda perlu memberikan informasi yang diperlukan dan menyerahkan beberapa dokumen identifikasi.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara menyetor dana ke akun saya?',
                        'description' =>
                            'Pertama, Anda perlu melewati proses keamanan dan dokumen identifikasi kami, lalu Anda dapat menyetor dana ke akun Anda menggunakan berbagai metode, termasuk transfer bank, bitcoin, dan banyak lagi.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bagaimana cara menarik uang?',
                        'description' =>
                            'Untuk melakukannya, Anda perlu mengisi dokumen keamanan dan identifikasi kami dan memilih jumlah yang ingin Anda tarik.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apakah Anda menawarkan akun Islami?',
                        'description' => 'Ya, kami menawarkannya.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Spread apa yang Anda tawarkan?',
                        'description' =>
                            'Kami menawarkan spread variabel yang mungkin serendah 0,0 pips. Kami tidak memiliki re-quoting: klien kami langsung diberikan nilai yang diterima sistem kami.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Leverage apa yang Anda tawarkan?',
                        'description' =>
                            'Leverage yang ditawarkan untuk akun perdagangan Daxtradefx adalah hingga 1:1000, tergantung pada jenis akun.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apakah Anda mengizinkan scalping?',
                        'description' => 'Ya, kami mengizinkan scalping.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apa itu stop loss?',
                        'description' =>
                            '- Stop-loss adalah perintah untuk menutup posisi yang telah dibuka sebelumnya pada harga yang kurang menguntungkan bagi klien dibandingkan dengan nilai pada saat menempatkan stop loss. Stop loss bisa menjadi batas yang Anda tetapkan untuk pesanan Anda. <br/> - Setelah batas ini tercapai, pesanan Anda ditutup. Harap diperhatikan bahwa Anda harus meninggalkan jarak tertentu dari nilai pasar saat ini saat Anda membuat pesanan stop/limit. Untuk detail lebih lanjut tentang jarak dalam poin untuk setiap pasangan mata uang, silakan lihat level limit dan stop di sini.<br/> - Menggunakan stop loss bermanfaat jika Anda ingin mengurangi kerugian Anda ketika pasar bergerak melawan Anda. Titik stop-loss selalu diatur di bawah kerugian saat ini pada BUY, atau di atas harga ASK saat ini pada SELL.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Apakah Anda mengizinkan hedging?',
                        'description' =>
                            '- Ya, kami mengizinkannya. Anda bebas untuk melakukan hedging pada akun perdagangan investasi Anda. Hedging terjadi ketika Anda membuka posisi panjang dan pendek pada instrumen yang sama secara bersamaan. Ketika Anda membuka posisi BUY dan SELL pada instrumen yang sama dan dalam ukuran lot yang sama, margin adalah 0. <br/> - Namun, ketika Anda membuka posisi BUY dan SELL pada CFD dari jenis yang sama dan ukuran lot yang sama, margin hanya diperlukan sekali, dan dapat dilihat di sini. Margin CFD, saat Anda di-hedge, biasanya 50%.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Bisakah saya mengubah leverage saya? Jika ya, bagaimana?',
                        'description' =>
                            'Ya, di bawah tab Akun Saya, Anda dapat mengubah leverage, lalu tekan tombol Ubah Leverage di bagian Anggota kami. Itu adalah metode perubahan leverage instan.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Saya masih memiliki pertanyaan.',
                        'description' =>
                            'Untuk pertanyaan lebih lanjut, Anda dapat menghubungi kami melalui email dan nomor kontak kami.',
                    ])
                </div>
            </div>
        </div>
    </section>
@endsection
