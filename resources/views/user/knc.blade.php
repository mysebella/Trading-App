@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Kenali Pelanggan Anda (KNC)',
        'path' => ['Beranda', 'Kenali Pelanggan Anda (KNC)'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full overflow-hidden">
            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Profil</p>
                </div>
                <div class="text-white/70 p-6 text-sm">
                    @if ($user->status == 'pending')
                        <div class="flex justify-center flex-col py-6 items-center">
                            <i class="fa-solid fa-spinner text-6xl mb-4 animate-spin"></i>
                            <p>Proses Aktivasi</p>
                        </div>
                    @elseif ($user->status == 'actived')
                        <div class="flex justify-center flex-col py-6 items-center">
                            <i class="fa-solid fa-check text-6xl mb-4"></i>
                            <p>Aktivasi Berhasil</p>
                        </div>
                    @else
                        <div>
                            <p>Silakan lengkapi formulir verifikasi di bawah ini dan kirimkan untuk mendapatkan akses penuh
                                ke akun Anda.</p>
                            <form action="{{ route('knc.update') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mt-10">
                                    @include('components.input-icon', [
                                        'label' => 'ID Pengguna',
                                        'name' => 'name',
                                        'value' => $user->name,
                                        'icon' => '<i class="fa fa-id-badge" aria-hidden="true"></i>',
                                    ])
                                </div>

                                <div class="mt-2 mb-4">
                                    @include('components.input-icon', [
                                        'label' => 'Kata Sandi',
                                        'name' => 'password',
                                        'icon' => '<i class="fa fa-key"></i>',
                                    ])
                                </div>

                                <div class="my-2">
                                    <p class="text-white/70 mb-2">Unggah Kartu Identitas</p>
                                    <div class="relative rounded-lg overflow-hidden border border-white/25">
                                        <input type="file" name="identityCard"
                                            class="p-3 file:absolute file:-top-[2px] file:-right-2 file:px-6  file:text-white file:bg-blue-500 file:border-0 file:h-[50px]" />
                                    </div>
                                </div>

                                <div class="my-4">
                                    <p class="text-white/70 mb-2">Foto Close Up</p>
                                    <div class="relative rounded-lg overflow-hidden border border-white/25">
                                        <input type="file" name="closeUpPhoto"
                                            class="p-3 file:absolute file:-top-[2px] file:-right-2 file:px-6  file:text-white file:bg-blue-500 file:border-0 file:h-[50px]" />
                                    </div>
                                </div>

                                @if ($user->status == 'noactived')
                                    <button class="bg-orange p-3 rounded-lg w-full text-black mt-2">Kirim
                                        Verifikasi</button>
                                @endif

                            </form>
                            <p class="mt-6">Unggah hanya file jpg, png, gif. Ukuran maksimum unggah 1 MB.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[45%]">
            <div class="overflow-hidden ">
                <div class="bg-black rounded-lg">
                    <div class="p-6 text-white/70 border-b border-white/25">
                        <p>Profil</p>
                    </div>

                    @if ($user->status == 'actived')
                        @include('components.verified', [
                            'label' => 'Akun sudah aktif',
                            'description' => 'Anda telah mengaktifkan akun Anda',
                        ])
                    @else
                        @include('components.unverified', ['label' => ''])
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
