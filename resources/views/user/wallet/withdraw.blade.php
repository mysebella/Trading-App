@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'RM Wallet',
        'path' => ['Setting', 'RM Wallet'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden">
            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Withdrawal</p>
                </div>

                @if ($user->status == 'actived')
                    <div class="px-6 py-2 pb-6">
                        <form action="{{ route('wallet.withdraw.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                @include('components.input-icon', [
                                    'icon' => 'USD',
                                    'label' => 'Amount Withdraw',
                                    'name' => 'amount',
                                    'required' => true,
                                    'type' => 'tel',
                                ])
                            </div>

                            <label class="text-white/70">Withdraw To</label>
                            <select name="withdrawTo" required
                                class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">
                                <option selected>Choose your account bank</option>
                                @foreach ($banksUser as $index => $bank)
                                    <option value="{{ $bank->id }}" data-no="{{ $bank->noRekening }}"
                                        data-name="{{ $bank->name }}">
                                        {{ $bank->bank }}
                                    </option>
                                @endforeach
                            </select>

                            <div>
                                @include('components.input', [
                                    'label' => 'Name',
                                    'name' => 'name_b',
                                    'readonly' => true,
                                ])
                            </div>

                            <div>
                                @include('components.input', [
                                    'label' => 'No Rekening',
                                    'name' => 'no_rekening',
                                    'readonly' => true,
                                ])
                            </div>

                            <div>
                                @include('components.input', [
                                    'label' => 'Note',
                                    'name' => 'note',
                                    'required' => true,
                                ])
                            </div>

                            <button class="p-2 bg-orange rounded text-white">Withdraw</button>
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
                                    <td class="table-border">Amount</td>
                                    <td class="table-border">Fee</td>
                                    <td class="table-border">News</td>
                                    <td class="table-border">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($withdraws) != 0)
                                    @foreach ($withdraws as $withdraw)
                                        <tr class="table-border">
                                            <td class="table-border">{{ $withdraw->created_at }}</td>
                                            <td class="table-border">@money($withdraw->amount)</td>
                                            <td class="table-border">@money($withdraw->fee)</td>
                                            <td class="table-border">{{ $withdraw->note }}</td>
                                            <td class="table-border">
                                                <button
                                                    class="{{ $withdraw->status == 'success' ? 'bg-green' : 'bg-red-500' }} first-letter:uppercase px-2 py-1 rounded">{{ $withdraw->status }}</button>
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

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('[name="withdrawTo"]');
            const nameInput = document.querySelector('[name="name_b"]');
            const noRekeningInput = document.querySelector('[name="no_rekening"]');

            selectElement.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const name = selectedOption.getAttribute('data-name');
                const noRekening = selectedOption.getAttribute('data-no');

                nameInput.value = name;
                noRekeningInput.value = noRekening;
            });
        });
    </script>
@endsection
