@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'RM Wallet',
        'path' => ['Setting', 'RM Wallet'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black h-[340px]">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Buy Balance</p>
            </div>
            <div class="p-6">
                <form action="{{ route('wallet.add-balance.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        @include('components.input-icon', [
                            'icon' => 'RM',
                            'label' => 'Amount Buy',
                            'name' => 'amount',
                        ])
                    </div>
                    <button class="p-2 bg-orange rounded text-white">Add Balance</button>
                </form>
                <div class="bg-blue-500 text-sm mt-4 p-4 rounded-lg text-white">
                    <p><i class="bi bi-info-circle-fill"></i> Notice:</p>
                    <p>Min RM 10.00, Max RM 150,000.00, Fee 0%.</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden bg-black text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Profits [ Total Profits : RM 22,500.00 ]</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Date</td>
                                    <td class="table-border">Amount</td>
                                    <td class="table-border">Pay</td>
                                    <td class="table-border">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-border">
                                    <td class="table-border">2024-05-23 11:15:31</td>
                                    <td class="table-border">RM 118,000.00</td>
                                    <td class="font-semibold table-border">
                                        <button class="bg-green py-1 px-3 rounded">
                                            <i class="bi bi-cash"></i>
                                            Payment
                                        </button>
                                    </td>
                                    <td class="font-semibold table-border">
                                        <button class="bg-green py-1 px-3 rounded">
                                            Done
                                        </button>
                                    </td>
                                </tr>
                                <tr class="table-border">
                                    <td class="table-border">2024-05-23 11:15:31</td>
                                    <td class="table-border">RM 118,000.00</td>
                                    <td class="font-semibold table-border">
                                        <button class="bg-green py-1 px-3 rounded">
                                            <i class="bi bi-cash"></i>
                                            Payment
                                        </button>
                                    </td>
                                    <td class="font-semibold table-border">
                                        <button class="bg-green py-1 px-3 rounded">
                                            Done
                                        </button>
                                    </td>
                                </tr>
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
