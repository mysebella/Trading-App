@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Package Investment',
        'path' => ['Setting', 'Package Investment'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black"
            x-bind:style="'max-height: ' + $ref.containerAdd.scrollHeight + 'px';">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Add Package Investment</p>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('dashboard.product.add-investment.post') }}" x-ref="containerAdd">
                    @csrf
                    <div>
                        @include('components.input', [
                            'label' => 'Name Package',
                            'name' => 'name',
                        ])

                        @include('components.input', [
                            'type' => 'tel',
                            'label' => 'Min',
                            'name' => 'min',
                        ])

                        @include('components.input', [
                            'type' => 'tel',
                            'label' => 'Max',
                            'name' => 'max',
                        ])


                        <label class="text-white/70" for="profit">Profit</label>
                        <div class="flex items-center">
                            <input type="tel" placeholder="Enter Profit" id="profit" name="profit"
                                class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-l-lg p-3 bg-black mb-4 border-r-0">

                            <select name="estimasiProfit"
                                class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-r-lg p-[11px] bg-black mb-4">
                                <option>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                            </select>
                        </div>

                        @include('components.input', [
                            'type' => 'tel',
                            'label' => 'contract',
                            'name' => 'contract',
                        ])
                    </div>
                    <button class="p-2 bg-orange rounded text-white">Add Package</button>
                </form>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>List Package Investment</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Name</td>
                                    <td class="table-border">Min</td>
                                    <td class="table-border">Max</td>
                                    <td class="table-border">Profits</td>
                                    <td class="table-border">Contract</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                    <tr class="table-border">
                                        <td class="table-border">{{ $package->name }}</td>
                                        <td class="table-border">@money($package->min)</td>
                                        <td class="table-border">@money($package->max)</td>
                                        <td class="table-border">
                                            {{ $package->profit }}% / {{ $package->estimasiProfit }}
                                        </td>
                                        <td class="table-border">{{ $package->contract }} {{ $package->estimasiProfit }}
                                        </td>
                                        <td class="table-border flex justify-center">
                                            <form>
                                                <button
                                                    class="bg-red-500 h-10 rounded w-10 flex justify-center items-center">
                                                    <i class="bi bi-trash3 text-lg"></i>
                                                </button>
                                            </form>
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
        </div>
    </section>
@endsection
