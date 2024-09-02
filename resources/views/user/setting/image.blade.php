@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Setting',
        'path' => ['Setting', 'Foto Profil'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-2/4 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Foto Profil</p>
            </div>
            <div class="text-white/70 p-6 text-sm">
                <p>Halaman ini memungkinkan Anda mengunggah foto pribadi ke profil Anda.</p>
                <p class="my-4">Ketentuan Foto</p>
                <ul class="list-disc ml-10">
                    <li>Format file gambar yang diperbolehkan: jpg, jpeg, png, dan gif.</li>
                    <li>Dimensi gambar akan secara otomatis disesuaikan dengan lebar maksimal 1024 piksel.</li>
                    <li>Ukuran file gambar tidak boleh lebih dari 1 MB.</li>
                </ul>
                <div src="" class="w-28 mt-6 h-28 bg-background bg-cover"
                    style="background-image: url({{ asset('') }}storage/photo-profile/{{ $user->profile[0]->photoProfile }});">
                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('setting.image.update') }}"
                    class=" mt-6">
                    @csrf
                    @method('PUT')

                    <label>Pilih Gambar</label><br>
                    <input type="file" class="mt-2" name="photoProfile" /><br />
                    <button class="bg-orange p-3 rounded-lg text-black mt-3 w-48">Perbarui</button>
                </form>
                <p class="mt-4">Unggah hanya file jpg, png, gif. Ukuran maksimal 1 MB.</p>
            </div>
    </section>
@endsection
