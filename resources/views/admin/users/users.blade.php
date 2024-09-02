@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Pengguna',
        'path' => ['Beranda', 'Pengguna'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Semua Pengguna</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Foto Profil</td>
                                <td class="table-border">Nama</td>
                                <td class="table-border">Nama Pengguna</td>
                                <td class="table-border">Email</td>
                                <td class="table-border">Status Aktif</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) != 0)
                                @foreach ($users as $key => $user)
                                    <tr class="table-border">
                                        <td class="table-border">
                                            <img src="{{ asset('') }}storage/photo-profile/{{ $user->profile[0]->photoProfile }}"
                                                width="55" class="m-auto" />
                                        </td>
                                        <td class="table-border">{{ $user->name }}</td>
                                        <td class="table-border">{{ $user->username }}</td>
                                        <td class="table-border">{{ $user->email }}</td>
                                        <td class="table-border">
                                            <button
                                                class="{{ $user->status == 'actived' ? 'bg-green' : 'bg-red-500' }} first-letter:uppercase px-2 py-1 rounded">{{ $user->status == 'actived' ? 'Aktif' : 'Tidak Aktif' }}</button>
                                        </td>
                                        <td class="table-border">
                                            <a href="{{ route('dashboard.users.view', ['id' => $user->id]) }}"
                                                class="flex justify-center">
                                                <img src="https://hsbglobaltrade.com/images/view.png" />
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-border">
                                    <td class="p-4">Tidak ada data tersedia di tabel</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between text-sm">
                    <div class="flex gap-2 items-center mb-4">
                        <p>Menampilkan 1 hingga 10 dari 13 entri</p>
                    </div>
                    <div class="flex items-center gap-4 my-7">
                        <a href="" class="block">Sebelumnya</a>
                        <ul>
                            <li class="w-7 h-7 flex justify-center items-center  rounded bg-orange">1</li>
                        </ul>
                        <a href="" class="block">Berikutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
