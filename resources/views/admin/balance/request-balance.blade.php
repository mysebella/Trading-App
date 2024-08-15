@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Request Balance',
        'path' => ['Home', 'Request Balance'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Request Balance</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Date</td>
                                <td class="table-border">No</td>
                                <td class="table-border">User</td>
                                <td class="table-border">Bukti Pembayaran</td>
                                <td class="table-border">Payment To</td>
                                <td class="table-border">Amount</td>
                                <td class="table-border">Note</td>
                                <td class="table-border">Status Paid</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($balances as $balance)
                                <tr class="table-border">
                                    <td class="table-border">{{ $balance->created_at }}</td>
                                    <td class="table-border">{{ $balance->code }}</td>
                                    <td class="table-border">{{ $balance->user->username }}</td>
                                    <td class="flex justify-center items-center h-20">
                                        @if (!$balance->proof)
                                            <p class="font-semibold text-lg">404</p>
                                        @else
                                            <img src="{{ asset('') }}storage/proof-balance/{{ $balance->proof }}"
                                                width="55" />
                                        @endif
                                    </td>
                                    <td class="table-border">{{ $balance->paymentTo }}</td>
                                    <td class="table-border">@money($balance->amount)</td>
                                    <td class="table-border">{{ $balance->note }}</td>
                                    <td class="table-border">
                                        @if ($balance->isPaid == 1)
                                            <button class="bg-green rounded px-3 py-1">PAID</button>
                                        @else
                                            <button class="bg-red-500 rounded px-3 py-1">UNPAID</button>
                                        @endif
                                    </td>
                                    <td class="table-border">
                                        @if ($balance->status == 'active')
                                            <div class="flex justify-center">
                                                <button
                                                    class="bg-green font-semibold h-10 rounded w-20 flex justify-center items-center">
                                                    <i class="fa-solid fa-circle-check text-lg text-white"></i>
                                                </button>
                                            </div>
                                        @else
                                            <form class="flex justify-center" method="POST"
                                                action="{{ route('dashboard.balances.requests.approve', ['id' => $balance->id, 'userId' => $balance->user->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="bg-green font-semibold h-10 px-3 rounded flex justify-center items-center">
                                                    Approve
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between text-sm">
                    <div class="flex gap-2 items-center mb-4">
                        <p>Showing 1 to 10 of 13 entries</p>
                    </div>
                    <div class="flex items-center gap-4 my-7">
                        <a href="" class="block">Previous</a>
                        <ul>
                            <li class="w-7 h-7 flex justify-center items-center  rounded bg-orange">1</li>
                        </ul>
                        <a href="" class="block">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
