@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'RM Wallet',
        'path' => ['Setting', 'RM Wallet'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] overflow-hidden">
            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Transfer</p>
                </div>

                @if ($user->status == 'actived')
                    <div class="px-6 py-2 pb-6">
                        <form action="{{ route('wallet.transfer.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                @include('components.input-icon', [
                                    'icon' => 'USD',
                                    'label' => 'Amount Transfer',
                                    'name' => 'amount',
                                    'type' => 'tel',
                                ])
                            </div>
                            <div>
                                @include('components.input', [
                                    'label' => 'Transfer To',
                                    'placeholder' => 'Enter destination username',
                                    'name' => 'recipient',
                                ])
                            </div>
                            <div>
                                @include('components.input', [
                                    'label' => 'Note',
                                    'name' => 'note',
                                ])
                            </div>

                            <button class="p-2 bg-orange rounded text-white">Transfer</button>
                        </form>
                    </div>
                @else
                    @include('components.unverified', ['label' => 'Transfer RM'])
                @endif
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden  text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Transfer History</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Date</td>
                                    <td class="table-border">To</td>
                                    <td class="table-border">Amount</td>
                                    <td class="table-border">News</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($histories) != 0)
                                    @foreach ($histories as $history)
                                        <tr>
                                            <td class="table-border">{{ $history->created_at }}</td>
                                            <td class="table-border">{{ $history->recipiente->username }}</td>
                                            <td class="table-border"> @money($history->amount) </td>
                                            <td class="table-border">{{ $history->note }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="table-border">
                                        <td class="p-4">No data available in table</td>
                                    </tr>
                                @endif
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
        </div>
    </section>
@endsection
