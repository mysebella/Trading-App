@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Faktur',
        'path' => ['Beranda', 'Faktur'],
    ])

    <section class="my-6 w-full flex flex-col gap-6">
        <div class="w-full bg-black overflow-hidden text-white/80 border border-white/35 p-6">
            <div class="text-2xl flex justify-between items-center border-b border-white/35 pb-4">
                <p>FAKTUR
                    @if ($investment->isPaid == 0)
                        <span class="text-red-500 text-lg font-semibold">(BELUM DIBAYAR)</span>
                    @else
                        <span class="text-green text-lg font-semibold">(SUDAH DIBAYAR)</span>
                    @endif
                </p>
                <p class="text-lg">Tanggal: {{ $investment->created_at->format('d/m/Y') }}</p>
            </div>

            <div class="text-xs mt-6 flex items-center">
                <div class="flex flex-col gap-1 w-1/4">
                    <p>Dari</p>
                    <p class="text-blue-500 font-medium">{{ env('APP_NAME') }}</p>
                    <p>Singapura</p>
                    <p>Telepon:</p>
                    <p>Email: admin@icmarketsinvestment.com</p>
                </div>
                <div class="flex flex-col gap-1 w-1/4">
                    <p>Kepada</p>
                    <p class="text-purple-400 font-medium">{{ $user->name }} ({{ $user->username }})</p>
                    <p>{{ $user->country }}</p>
                    <p>Telepon: {{ $user->numberPhone }}</p>
                    <p>Email: {{ $user->email }}</p>
                </div>
                <div class="flex w-2/4 text-sm p-3 items-center bg-[#3E3E3E] border border-white/70 h-16 justify-between">
                    <p><span class="font-semibold">Faktur:</span>{{ $investment->code }}</p>
                    <p><span class="font-semibold">Tanggal Pesanan:</span>{{ $investment->created_at->format('d/m/Y') }}</p>
                    <p><span class="font-semibold">Akun:</span>{{ $user->username }}</p>
                </div>
            </div>

            <div class="mt-6">
                <table class="w-full table-border">
                    <thead class="bg-[#C8C8C8] text-black font-medium">
                        <tr class="table-border">
                            <td class="table-border">#</td>
                            <td class="table-border">Deskripsi</td>
                            <td class="table-border">Jumlah</td>
                            <td class="table-border">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="table-border">1</td>
                            <td class="table-border">Tambah Investasi (Paket {{ $investment->package->name }})</td>
                            <td class="table-border">@money($investment->amount)</td>
                            <td class="table-border">@money($investment->amount)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-6 text-xl text-end">
                <span class="py-2 border-t border-white/35">
                    <span>Total Transfer :</span> @money($investment->amount)
                </span>
            </div>

            @if ($investment->isPaid == 0)
                <div class="w-full bg-black flex flex-col lg:flex-row gap-6 overflow-hidden text-white/80">
                    <div class="bg-black rounded-lg overflow-hidden w-full border border-white/25">
                        <div class="p-4 text-lg text-white/70 border-b border-white/25">
                            <p>Pembayaran Bank</p>
                        </div>
                        <div class="px-4">
                            <ul>
                                @foreach ($banks as $bank)
                                    <li class="py-4 px-6 gap-6 flex border-b border-white/25 last:border-0">
                                        <div class="w-28 bg-center h-14 bg-cover"
                                            style="background-image: url('{{ asset('') }}storage/bank/{{ $bank->image }}');">
                                        </div>
                                        <div class="w-[60%] flex justify-center">
                                            <div>
                                                <p>{{ $bank->bank }}</p>
                                                <p>Acc : {{ $bank->noRekening }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="bg-black rounded-lg overflow-hidden w-full border border-white/25">
                        <div class="p-4 text-lg text-white/70 border-b border-white/25">
                            <p>Bayar dengan Saldo Dompet</p>
                        </div>
                        <div class="p-4 py-6">
                            @include('components.input', [
                                'label' => 'Saldo Dompet yang Tersedia',
                                'name' => 'amount',
                                'readonly' => true,
                                'value' =>
                                    $user->profile[0]->balance == '0.00'
                                        ? 'Tidak Ada Saldo'
                                        : 'RP ' . $user->profile[0]->balance,
                            ])
                            <a href="{{ route('investment.confirmation', ['id' => $investment->id, 'balance' => '']) }}"
                                class="p-2 bg-orange rounded text-white font-semibold">Bayar Sekarang</a>
                        </div>
                    </div>
                </div>

                <p class="my-6">Silakan konfirmasi manual jika Anda sudah melakukan pembayaran dan sistem tidak secara
                    otomatis mengonfirmasi pembayaran Anda.</p>
                <a href="{{ route('investment.confirmation', ['id' => $investment->id]) }}"
                    class="p-2 bg-orange rounded text-white font-semibold">Konfirmasi</a>
            @endif

        </div>
    </section>
@endsection
