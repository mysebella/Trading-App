@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Investasi',
        'path' => ['Beranda', 'Investasi'],
    ])

    <section class="w-full mt-6 overflow-hidden rounded-lg text-white/80">
        <div class="w-full flex flex-col lg:grid grid-cols-4 gap-4">

            @foreach ($packages as $package)
                <form method="GET" class="p-10 rounded-lg bg-black" action="{{ route('investment.paid') }}">
                    <p class="font-semibold text-blue-400 text-xl text-center">{{ $package->name }}</p>

                    <ul class="list-disc p-10 text-sm">
                        <li>Jumlah Min. @money($package->min)</li>
                        <li>Jumlah Max. @money($package->max)</li>
                        <li>Keuntungan {{ $package->profit }}% ({{ $package->estimasiProfit }})</li>
                        <li>Kontrak {{ $package->contract }} Hari</li>
                    </ul>

                    <input type="number" class="hidden" name="package" value="{{ $package->id }}">

                    @include('components.input-icon', [
                        'icon' => 'RP',
                        'name' => 'amount',
                        'type' => 'tel',
                        'required' => true,
                    ])

                    <button class="bg-orange p-3 rounded-lg w-full text-black mt-4">Investasi Sekarang</button>
                </form>
            @endforeach
        </div>

        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Riwayat</p>
            </div>
            <div class="p-4 lg:p-6 overflow-x-scroll">
                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Tanggal</td>
                                <td class="table-border">Paket</td>
                                <td class="table-border">Jumlah</td>
                                <td class="table-border">Status</td>
                                <td class="table-border">Faktur</td>
                                <td class="table-border">Status</td>
                                <td class="table-border">Detail</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($histories))
                                @foreach ($histories as $history)
                                    <tr class="table-border p-10">
                                        <td class="table-border">{{ $history->created_at }}</td>
                                        <td class="table-border">Paket {{ $history->package->name }}</td>
                                        <td class="table-border">@money($history->amount)</td>
                                        <td class="table-border">
                                            @if ($history->proccess == 'success')
                                                <a class="py-1 px-3 rounded bg-green">
                                                    {{ $history->proccess }}
                                                </a>
                                            @else
                                                <a class="py-1 px-3 rounded bg-red-500">
                                                    <i class="bi bi-arrow-clockwise "></i>&nbsp;{{ $history->proccess }}
                                                </a>
                                            @endif
                                        </td>
                                        <td class="table-border">
                                            <a href="{{ route('investment.invoice', ['code' => $history->code]) }}"
                                                class="py-1 px-3 rounded bg-blue-500">Faktur</a>
                                        </td>
                                        <td class="table-border">
                                            <a
                                                class="py-1 px-3 rounded {{ $history->status == 'active' ? 'bg-green' : 'bg-red-500' }}">{{ $history->status }}</a>
                                        </td>
                                        <td class="table-border">
                                            @if ($history->isPaid == 1)
                                                <button class="py-1 px-3 rounded bg-green">TERBAYAR</button>
                                            @else
                                                <button class="py-1 px-3 rounded bg-red-500">BELUM TERBAYAR</button>
                                            @endif
                                        </td>
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
            </div>
        </div>
    </section>
@endsection
