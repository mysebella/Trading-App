@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'History',
        'path' => ['Home', 'History'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>My Trade</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-bottom-border">
                        <thead>
                            <tr class="table-bottom-border">
                                <td class="table-border w-[12%]">Date</td>
                                <td class="table-border w-[12%]">Market</td>
                                <td class="table-border w-[12%]">Trx</td>
                                <td class="table-border w-[12%]">Package</td>
                                <td class="table-border w-[12%]">Amount</td>
                                <td class="table-border w-[12%]">Rate Stake</td>
                                <td class="table-border w-[12%]">Profit</td>
                                <td class="table-border w-[12%]">Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($tradings) != 0)
                                @foreach ($tradings as $trading)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $trading->created_at }}</td>
                                        <td class="table-border uppercase">{{ $trading->market }}</td>
                                        <td class="table-border">
                                            <span
                                                class="{{ $trading->type == 'buy' ? 'win' : 'lose' }} uppercase">{{ $trading->type }}</span>
                                            <br />{{ $trading->package }}
                                        </td>
                                        <td class="table-border">@money($trading->amount)</td>
                                        <td class="table-border">
                                            <button class="bg-blue-500 px-2 py-1 rounded">Detail</button>
                                        </td>
                                        <td class="table-border">@money($trading->open)</td>
                                        <td class="table-border">
                                            @if ($trading->status == 'pending')
                                                <button class="bg-orange px-2 py-1 rounded">Pending</button>
                                            @else
                                                <p>{{ $trading->profit }}</p>
                                            @endif
                                        </td>
                                        <td class="table-border">
                                            <button
                                                class="{{ $trading->status == 'win' ? 'bg-green' : 'bg-red-500' }} px-2 py-1 rounded">{{ $trading->status }}</button>
                                        </td>
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
    </section>
@endsection
