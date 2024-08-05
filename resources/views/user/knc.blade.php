@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Know Your Customer (KNC)',
        'path' => ['Home', 'Know Your Customer (KNC)'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Profile</p>
            </div>
            <div class="text-white/70 p-6 text-sm">
                <p>Please complete the verification form below and send it to get full access to your account.</p>
                <form action="{{ route('knc.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mt-10">
                        @include('components.input-icon', [
                            'label' => 'User ID',
                            'name' => 'name',
                            'value' => $user->name,
                            'icon' => '<i class="fa fa-id-badge" aria-hidden="true"></i>',
                        ])
                    </div>

                    <div class="mt-2 mb-4">
                        @include('components.input-icon', [
                            'label' => 'Password',
                            'name' => 'password',
                            'icon' => '<i class="fa fa-key"></i>',
                        ])
                    </div>

                    <div class="my-2">
                        <p class="text-white/70 mb-2">Upload Identity Card</p>

                        @if (!$user->profile[0]->identityCard)
                            <div class="relative rounded-lg overflow-hidden border border-white/25">
                                <input type="file" name="identityCard"
                                    class="p-3 file:absolute file:-top-[2px] file:-right-2 file:px-6  file:text-white file:bg-blue-500 file:border-0 file:h-[50px]" />
                            </div>
                        @else
                            <img src="{{ asset('') }}storage/identity-card/{{ $user->profile[0]->identityCard }}" />
                        @endif
                    </div>

                    <div class="my-4">
                        <p class="text-white/70 mb-2">Close Up Photo</p>

                        @if (!$user->profile[0]->closeUpPhoto)
                            <div class="relative rounded-lg overflow-hidden border border-white/25">
                                <input type="file" name="closeUpPhoto"
                                    class="p-3 file:absolute file:-top-[2px] file:-right-2 file:px-6  file:text-white file:bg-blue-500 file:border-0 file:h-[50px]" />
                            </div>
                        @else
                            <img src="{{ asset('') }}storage/close-up/{{ $user->profile[0]->closeUpPhoto }}" />
                        @endif
                    </div>

                    @if ($user->status == 1)
                    @else
                        <button class="bg-orange p-3 rounded-lg w-full text-black mt-2">Send Verification</button>
                    @endif
                </form>
                <p class="mt-6">Upload only file jpg, png, gif. Max size upload 1 MB.</p>
            </div>
        </div>

        <div class="w-full lg:w-[45%] h-96">
            <div class="rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Profile</p>
                </div>
                @if ($user->status == 1)
                    @include('components.verified', [
                        'label' => 'account has been active',
                        'description' => 'you have activated your account',
                    ])
                @else
                    @include('components.unverified', ['label' => 'Transfer balance'])
                @endif
            </div>
        </div>
    </section>
@endsection
