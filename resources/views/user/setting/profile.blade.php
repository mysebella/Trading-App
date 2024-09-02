@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Pengaturan',
        'path' => ['Pengaturan', 'Profile'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Profile</p>
            </div>

            <div class="text-white p-6">
                <form action="{{ route('setting.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('components.input', [
                        'label' => 'Username',
                        'name' => 'user[username]',
                        'value' => $user->username,
                    ])

                    @include('components.input', [
                        'label' => 'Refferals',
                        'name' => 'refferal',
                        'value' => $user->username,
                    ])

                    @include('components.input', [
                        'label' => 'Nama Lengkap',
                        'name' => 'user[name]',
                        'value' => $user->name,
                    ])

                    @include('components.input', [
                        'label' => 'Alamat',
                        'name' => 'profile[address]',
                        'value' => $user->profile[0]->address,
                    ])

                    @include('components.input', [
                        'label' => 'Negara',
                        'name' => 'user[country]',
                        'value' => $user->country,
                    ])

                    @include('components.input', [
                        'label' => 'Alamat Email',
                        'name' => 'user[email]',
                        'value' => $user->email,
                    ])

                    <label class="text-white/70" for="phone">Nomor Telepon</label>
                    <div class="flex items-center">
                        <div
                            class="bg-background outline-none p-3 mb-2 border border-white/30 rounded-l-lg border-r-0 h-[46px]">
                            🇮🇩
                        </div>
                        <input type="tel" value="{{ $user->numberPhone }}" id="phone" name="phone"
                            class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-r-lg p-3 bg-black mb-4"
                            readonly>
                    </div>

                    @include('components.input', [
                        'label' => 'Alamat Bitcoin',
                        'name' => 'profile[bitcoinAddress]',
                        'value' => $user->profile[0]->bitcoinAddress,
                    ])

                    @include('components.input', [
                        'label' => 'Nama Bank',
                        'name' => 'profile[bank]',
                        'value' => $user->profile[0]->bank,
                    ])

                    <label class="text-white/70" for="email">Notifikasi Login</label><br />
                    <select name="profile[notificationLogin]"
                        class="bg-background outline-none p-3 mb-2 border border-white/30 w-full mt-2 rounded-lg h-[50px]">
                        <option value="1" {{ $user->profile[0]->notificationLogin == 1 ? 'selected' : '' }}>
                            Kirimkan ke saya ketika login
                        </option>
                        <option value="0" {{ $user->profile[0]->notificationLogin == 0 ? 'selected' : '' }}>
                            Jangan kirimkan ke saya ketika login
                        </option>
                    </select>

                    <button class="bg-orange p-3 rounded-lg w-full text-black mt-2">Perbarui</button>
                </form>
            </div>
        </div>

        <div class="w-full rounded-lg overflow-hidden bg-black" style="max-height: 450px;">
            <div class="p-6 text-white/70 border-b border-white/25" id="i">
                Rubah Password
            </div>

            <div class="text-white p-6" x-ref="changePasswordContainer">
                <form action="{{ route('setting.profile.update.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('components.input', [
                        'label' => 'Password Dulu',
                        'name' => 'user[currentPassword]',
                    ])

                    @include('components.input', [
                        'label' => 'Password Baru',
                        'name' => 'user[newPassword]',
                    ])

                    @include('components.input', [
                        'label' => 'Konfirmasi Password Baru',
                        'name' => 'user[confirmPassword]',
                    ])

                    <button id="button-password" class="bg-orange p-3 rounded-lg w-full text-black mt-2">Rubah
                        Password</button>
                </form>
            </div>
        </div>
    </section>
@endsection
