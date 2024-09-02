@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Referral',
        'path' => ['Beranda', 'Referral'],
    ])

    <section class="my-6 w-full lg:w-2/4">
        <div class="flex">
            <input class="text-white/50 w-full border border-white/30 rounded-l p-3 bg-black"
                value="{{ env('APP_URL') }}/refferal?reff={{ $user->username }}">
            <button class="bg-orange w-52 lg:w-44 text-white rounded-r">Salin URL Reff</button>
        </div>
    </section>

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Referral [ {{ count($refferals) }} Pengguna ]</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Tanggal Bergabung</td>
                                <td class="table-border">ID Pengguna</td>
                                <td class="table-border">Nama</td>
                                <td class="table-border">Alamat Email</td>
                                <td class="table-border">Telepon</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($refferals) != 0)
                                @foreach ($refferals as $refferal)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $refferal->created_at }}</td>
                                        <td class="table-border">{{ $refferal->inviteds->id }}</td>
                                        <td class="table-border">{{ $refferal->inviteds->name }}</td>
                                        <td class="table-border">{{ $refferal->inviteds->email }}</td>
                                        <td class="table-border">{{ $refferal->inviteds->numberPhone }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-border">
                                    <td class="p-4">Data tidak tersedia di tabel</td>
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
                        <a href="" class="block">Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
