@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Konfirmasi',
        'path' => ['Beranda', 'Konfirmasi'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black"
            x-bind:style="'max-height: ' + $ref.containerAdd.scrollHeight + 'px';">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Konfirmasi</p>
            </div>
            <div class="p-6">
                @if ($investment->isPaid == 1)
                    <div class="p-4 rounded-lg text-white bg-green">
                        Konfirmasi untuk faktur {{ $investment->code }} telah dikirim sebelumnya, mohon tunggu kami akan
                        memproses konfirmasi Anda secepatnya.
                    </div>
                @else
                    <form method="POST" action="{{ route('investment.confirmation.put', ['id' => $investment->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div x-ref="containerAdd">
                            @csrf
                            <div>
                                @include('components.input', [
                                    'label' => 'Paket',
                                    'name' => 'name',
                                    'value' => $investment->package->name,
                                ])

                                <div>
                                    <label class="text-white/70">Bayar Dengan</label>
                                    <select name="paymentTo"
                                        class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">
                                        @if (isset($_GET['balance']))
                                            <option value="wallet">
                                                Saldo Dompet
                                            </option>
                                        @endif
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->bank }}">{{ $bank->bank }}
                                                REK:{{ $bank->noRekening }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @include('components.input', [
                                    'label' => 'Catatan',
                                    'name' => 'note',
                                ])

                                <div class="flex gap-2 mt-2 mb-5">
                                    <p class="text-white/75">Unggah</p>
                                    <input type="file" name="proof" class="text-white/70" />
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <a href="{{ route('investment.index') }}"
                                    class="p-2 bg-red-500 rounded text-white">Kembali</a>
                                <button class="p-2 bg-orange rounded text-white">Konfirmasi</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Riwayat</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Tanggal</td>
                                    <td class="table-border">Faktur</td>
                                    <td class="table-border">Jumlah</td>
                                    <td class="table-border">Pembayaran Kepada</td>
                                    <td class="table-border">Info</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($histories) != 0)
                                    @foreach ($histories as $history)
                                        <tr class="table-border">
                                            <td class="table-border">{{ $history->created_at }}</td>
                                            <td class="table-border">Tambah Paket {{ $history->package->name }}</td>
                                            <td class="table-border">@money($history->amount)</td>
                                            <td class="table-border">{{ $history->paymentTo }}</td>
                                            <td class="table-border">{{ $history->note }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="table-border">
                                        <td class="p-4">Tidak ada data yang tersedia di tabel</td>
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
        </div>
    </section>
@endsection
