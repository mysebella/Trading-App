@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Download',
        'path' => ['Beranda', 'Download'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Download</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Judul</td>
                                <td class="table-border">Deskripsi</td>
                                <td class="table-border">Hits</td>
                                <td class="table-border">Status</td>
                                <td class="table-border">File</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($files) != 0)
                                @foreach ($files as $item)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $item->title }}</td>
                                        <td class="table-border">{{ $item->description }}</td>
                                        <td class="table-border">{{ $item->downloaded }}</td>
                                        <td class="table-border">
                                            <button
                                                class="px-3 py-1 {{ $item->isDownloaded == 0 ? 'bg-red-500' : 'bg-green' }} rounded">
                                                {{ $item->isDownloaded == 0 ? 'Belum Diunduh' : 'Diunduh' }}
                                            </button>
                                        </td>
                                        <td class="table-border">
                                            <button class="px-3 py-1 bg-green rounded">
                                                Unduh
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-border">
                                    <td class="p-4">Tidak ada data di tabel</td>
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
                            <li class="w-7 h-7 flex justify-center items-center rounded bg-orange">1</li>
                        </ul>
                        <a href="" class="block">Berikutnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
