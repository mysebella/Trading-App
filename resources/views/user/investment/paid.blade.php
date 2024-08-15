@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Investment',
        'path' => ['Home', 'Investment'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black"
            x-bind:style="'max-height: ' + $ref.containerAdd.scrollHeight + 'px';">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Add Investment</p>
            </div>
            <div class="p-6">
                <div x-ref="containerAdd">
                    @csrf
                    <div>
                        @include('components.input', [
                            'label' => 'Package',
                            'name' => 'name',
                            'value' => $package->name,
                        ])

                        @include('components.input', [
                            'label' => 'Amount Investment',
                            'name' => 'amount',
                            'value' => 'USD ' . $package->amount . '.00',
                        ])

                        @include('components.input', [
                            'label' => 'Profit',
                            'name' => 'profit',
                            'value' =>
                                "$package->profit% ($package->estimasiProfit) USD " .
                                ($package->profit / 100) * $package->amount .
                                '.00',
                        ])

                        @include('components.input', [
                            'label' => 'Contract / OI',
                            'name' => 'contract',
                            'value' =>
                                $package->contract .
                                " $package->estimasiProfit (USD " .
                                $package->contract * ($package->profit / 100) * $package->amount .
                                '.00)',
                        ])
                    </div>

                    <div class="bg-blue-500 text-sm my-4 p-4 rounded-lg text-white">
                        <p><i class="bi bi-info-circle-fill"></i> Notice:</p>
                        <p>if it is appropriate please click submit</p>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('investment.index') }}" class="p-2 bg-red-500 rounded text-white">Back</a>
                        <form action="{{ route('investment.paid.post') }}" method="POST">
                            @csrf
                            <input type="text" class="hidden" name="amount" value="{{ $package->amount }}">
                            <input type="number" class="hidden" name="package_id" value="{{ $package->id }}">
                            <button class="p-2 bg-orange rounded text-white">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>History</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Date</td>
                                    <td class="table-border">Package</td>
                                    <td class="table-border">Amount</td>
                                    <td class="table-border">Status</td>
                                    <td class="table-border">Invoice</td>
                                    <td class="table-border">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($histories) != 0)
                                    @foreach ($histories as $history)
                                        <tr class="table-border">
                                            <td class="table-border">{{ $history->created_at }}</td>
                                            <td class="table-border">{{ $history->package->name }}</td>
                                            <td class="table-border">@money($history->amount)</td>
                                            <td class="table-border">{{ $history->status }}</td>
                                            <td class="table-border">
                                                <a href=""
                                                    class="bg-green font-semibold py-1 px-2 rounded">Invoice</a>
                                            </td>
                                            <td class="table-border">
                                                <a href=""
                                                    class="bg-green font-semibold py-1 px-2 rounded">Detail</a>
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
        </div>
    </section>
@endsection
