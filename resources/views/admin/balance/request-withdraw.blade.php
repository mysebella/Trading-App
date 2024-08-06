@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Request Withdraw',
        'path' => ['Home', 'Request Withdraw'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Request Withdraw</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Date</td>
                                <td class="table-border">No</td>
                                <td class="table-border">Package</td>
                                <td class="table-border">Market</td>
                                <td class="table-border">Amount</td>
                                <td class="table-border">Date End</td>
                                <td class="table-border">Status</td>
                                <td class="table-border">Win/Lost</td>
                                <td class="table-border">Rate Trade</td>
                                <td class="table-border">Rate End</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-border">
                                <td class="table-border">2024-05-23 11:15:31</td>
                                <td class="table-border">588NY6NR2YZ2</td>
                                <td class="table-border">30 SECOND</td>
                                <td class="table-border">BTC/USD</td>
                                <td class="table-border">USD 2,500.00</td>
                                <td class="table-border">2024-05-23 11:16:01</td>
                                <td class="table-border"><button class="bg-green rounded px-3 py-1">win</button></td>
                                <td class="table-border">USD 4,500.00 180%</td>
                                <td class="table-border">47,712.31 USD</td>
                                <td class="table-border win"><i class="bi bi-arrow-up-circle-fill"></i> 47,712.31 USD</td>
                            </tr>
                            <tr class="table-border">
                                <td class="table-border">2024-05-23 11:15:31</td>
                                <td class="table-border">588NY6NR2YZ2</td>
                                <td class="table-border">30 SECOND</td>
                                <td class="table-border">BTC/USD</td>
                                <td class="table-border">USD 2,500.00</td>
                                <td class="table-border">2024-05-23 11:16:01</td>
                                <td class="table-border"><button class="bg-red-500 rounded px-3 py-1">Lose</button></td>
                                <td class="table-border">USD 4,500.00 180%</td>
                                <td class="table-border">47,712.31 USD</td>
                                <td class="table-border lose"><i class="bi bi-arrow-down-circle-fill"></i> 47,712.31 USD
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
    </section>
@endsection
