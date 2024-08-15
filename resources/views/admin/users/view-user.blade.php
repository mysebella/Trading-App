@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'View User',
        'path' => ['Admin', 'View User'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full overflow-hidden">
            <div class="bg-black rounded-lg mb-4">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Profile User</p>
                </div>

                <div class="text-white p-6">
                    <label class="text-white/70">Photo Profile</label>
                    <div class="bg-cover w-32 mb-4 mt-4 h-32 bg-background"
                        style="background-image: url({{ asset('') }}storage/photo-profile/{{ $usera->profile[0]->photoProfile }});">
                    </div>

                    <div class="my-4">
                        <label class="text-white/70">Status</label>
                        @if ($usera->status == 'actived')
                            <button class="bg-green p-1 px-2 rounded">Actived</button>
                        @else
                            <button class="bg-red-500 p-1 px-2 rounded">No Actived</button>
                        @endif
                    </div>

                    <form>
                        @include('components.input', [
                            'label' => 'Username',
                            'name' => 'user[username]',
                            'value' => $usera->username,
                        ])

                        @include('components.input', [
                            'label' => 'Refferals',
                            'name' => 'refferal',
                            'value' => $usera->username,
                        ])

                        @include('components.input', [
                            'label' => 'Fullname',
                            'name' => 'user[name]',
                            'value' => $usera->name,
                        ])

                        @include('components.input', [
                            'label' => 'Address',
                            'name' => 'profile[address]',
                            'value' => $usera->profile[0]->address,
                        ])

                        @include('components.input', [
                            'label' => 'Country',
                            'name' => 'user[country]',
                            'value' => $usera->country,
                        ])

                        @include('components.input', [
                            'label' => 'Email Address',
                            'name' => 'user[email]',
                            'value' => $usera->email,
                        ])

                        <label class="text-white/70" for="phone">Phone Number</label>
                        <div class="flex items-center">
                            <divusera
                                class="bg-background outline-none p-3 mb-2 border border-white/30 rounded-l-lg border-r-0 h-[46px]">
                                🇲🇾
                            </divusera>
                            <input type="tel" value="{{ $usera->numberPhone }}" id="phone" name="phone"
                                class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-r-lg p-3 bg-black mb-4"
                                readonly>
                        </div>

                        @include('components.input', [
                            'label' => 'Bitcoin Address',
                            'name' => 'profile[bitcoinAddress]',
                            'value' => $usera->profile[0]->bitcoinAddress,
                        ])

                        @include('components.input', [
                            'label' => 'Bank',
                            'name' => 'profile[bank]',
                            'value' => $usera->profile[0]->bank,
                        ])

                        <label class="text-white/70" for="email">Notification Login</label><br />
                        <select name="profile[notificationLogin]"
                            class="bg-background outline-none p-3 mb-2 border border-white/30 w-full mt-2 rounded-lg h-[50px]">
                            <option value="1" {{ $usera->profile[0]->notificationLogin == 1 ? 'selected' : '' }}>
                                Send me Email when Login
                            </option>
                            <option value="0" {{ $usera->profile[0]->notificationLogin == 0 ? 'selected' : '' }}>
                                Dont Send me Email when Login
                            </option>
                        </select>
                    </form>
                </div>
            </div>

            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Add Balance User</p>
                </div>

                <div class="text-white px-6 py-4">
                    <form method="POST" action="{{ route('dashboard.users.update.balance', ['id' => $usera->id]) }}">
                        @method('PUT')
                        @csrf

                        @include('components.input-icon', [
                            'label' => 'Current Balance',
                            'icon' => 'USD',
                            'readonly' => true,
                            'name' => 'currentBalance',
                            'value' => $usera->profile[0]->balance,
                        ])

                        <div class="mt-4">
                            @include('components.input-icon', [
                                'label' => 'Add Balance',
                                'icon' => 'USD',
                                'name' => 'balance',
                            ])
                        </div>

                        <button id="button-password" class="bg-orange p-3 rounded-lg w-full text-black mt-4">Add
                            Saldo</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-full overflow-hidden">
            <div class="bg-black rounded-lg mb-4">
                <div class="p-6 text-white/70 border-b border-white/25" id="i">
                    Identity Card
                </div>

                <div class="text-white/70 p-6" x-ref="changePasswordContainer">
                    <div class="mb-4">
                        @if (!$usera->profile[0]->identityCard)
                            <div class="relative rounded-lg overflow-hidden p-4 text-center">
                                <div class="flex justify-center flex-col items-center ">
                                    <img src="{{ asset('') }}images/unverified.png" alt="unverified"
                                        class="ml-3 w-28 h-28 mb-2" />
                                    <p>user has not uploaded</p>
                                </div>
                            </div>
                        @else
                            <img class="w-full  rounded"
                                src="{{ asset('') }}storage/identity-card/{{ $usera->profile[0]->identityCard }}" />
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25" id="i">
                    Close Up
                </div>
                <div class="text-white/70 p-6" x-ref="changePasswordContainer">
                    <div>
                        @if (!$usera->profile[0]->identityCard)
                            <div class="relative rounded-lg overflow-hidden p-4 text-center">
                                <div class="flex justify-center flex-col items-center ">
                                    <img src="{{ asset('') }}images/unverified.png" alt="unverified"
                                        class="ml-3 w-28 h-28 mb-2" />
                                    <p>user has not uploaded</p>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('') }}storage/close-up/{{ $usera->profile[0]->closeUpPhoto }}"
                                class="w-full rounded" />
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex py-4 gap-2" style="color: white;">
                <form method="POST" action="{{ route('dashboard.users.update', ['id' => $usera->id]) }}" class="w-full">
                    @csrf
                    @method('PUT')
                    <button id="button-password" class="bg-green p-3 rounded-lg w-full mt-2" name="status"
                        value="actived">Approve</button>
                </form>
                <form method="POST" action="{{ route('dashboard.users.update', ['id' => $usera->id]) }}" class="w-full">
                    @csrf
                    @method('PUT')
                    <button id="button-password" class="bg-red-500 p-3 rounded-lg w-full mt-2" name="status"
                        value="noactived">Reject</button>
                </form>
            </div>
        </div>
    </section>
@endsection
