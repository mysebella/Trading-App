@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Keuntungan',
        'path' => ['Beranda', 'Keuntungan'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Keuntungan [ Total Keuntungan : @money($totalProfit) ]</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border w-[25%]">Tanggal</td>
                                <td class="table-border w-[25%]">No</td>
                                <td class="table-border w-[25%]">Jenis</td>
                                <td class="table-border w-[25%]">Jumlah</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($tradings) != 0)
                                @foreach ($tradings as $trading)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $trading->created_at }}</td>
                                        <td class="table-border">{{ $trading->code }}</td>
                                        <td class="table-border">{{ $trading->package }}</td>
                                        <td class="table-border">@money($trading->amount)</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="table-border">
                                    <td class="p-4">Tidak ada data tersedia dalam tabel</td>
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
