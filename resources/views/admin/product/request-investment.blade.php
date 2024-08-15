@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Request Investment',
        'path' => ['Home', 'Request Investment'],
    ])

    <section class="my-6 w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Request Investment</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Date</td>
                                <td class="table-border">Proof Payment</td>
                                <td class="table-border">Code</td>
                                <td class="table-border">User</td>
                                <td class="table-border">Package</td>
                                <td class="table-border">Amount</td>
                                <td class="table-border">isPaid</td>
                                <td class="table-border">Expires At</td>
                                <td class="table-border">Note</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investment as $invest)
                                <tr class="table-border">
                                    <td class="table-border">{{ $invest->created_at }}</td>
                                    <td class="flex h-20 justify-center items-center">
                                        @if (!$invest->proof)
                                            <p class="font-semibold text-lg">404</p>
                                        @else
                                            <img src="{{ asset('') }}storage/proof-payment/{{ $invest->proof }}"
                                                width="70" />
                                        @endif
                                    </td>
                                    <td class="table-border">588NY6NR2YZ2</td>
                                    <td class="table-border">{{ $invest->user->username }}</td>
                                    <td class="table-border">Package {{ $invest->package->name }}</td>
                                    <td class="table-border">@money($invest->amount)</td>
                                    <td class="table-border">
                                        @if ($invest->isPaid == 1)
                                            <button class="bg-green rounded px-3 py-1">PAID</button>
                                        @else
                                            <button class="bg-red-500 rounded px-3 py-1">UNPAID</button>
                                        @endif
                                    </td>
                                    <td class="table-border">
                                        {{ !$invest->expiresAt ? 'Please ACC to see' : $invest->expiresAt }}
                                    </td>
                                    <td class="table-border">{{ $invest->note }}</td>
                                    <td class="table-border">
                                        @if ($invest->status == 'active')
                                            <div class="flex justify-center">
                                                <button
                                                    class="bg-green font-semibold h-10 rounded w-20 flex justify-center items-center">
                                                    Success
                                                </button>
                                            </div>
                                        @else
                                            <form class="flex justify-center" method="POST"
                                                action="{{ route('dashboard.investments.requests.approve', ['id' => $invest->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                    class="bg-green font-semibold h-10 rounded w-20 flex justify-center items-center">
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

@section('javascript')
    <script src="{{ asset('') }}js/chart.js"></script>
@endsection
