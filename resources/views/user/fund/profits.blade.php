@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Profits Invest',
        'path' => ['Home', 'Profits'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Profits [ Total Profits : RM @money($totalProfit) ]</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border w-[25%]">Date</td>
                                <td class="table-border w-[25%]">Deposite Code</td>
                                <td class="table-border w-[25%]">Type</td>
                                <td class="table-border w-[25%]">Amount</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($profitInvests) != 0)
                                @foreach ($profitInvests as $profit)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $profit->created_at }}</td>
                                        <td class="table-border">{{ $profit->code }}</td>
                                        <td class="table-border">Package {{ $profit->package->name }}</td>
                                        <td class="table-border">{{ $profit->profit }}</td>
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
