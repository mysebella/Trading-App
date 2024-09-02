@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Bank',
        'path' => ['Pengaturan', 'Bank'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black"
            x-bind:style="'max-height: ' + $ref.containerAdd.scrollHeight + 'px';">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Tambah Akun Bank</p>
            </div>
            <div class="p-6">
                <form action="{{ route('dashboard.admin.bank-accounts.store') }}" x-ref="containerAdd"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                        @if ($user->role == 'admin')
                            <label class="text-white/70" for="image">Gambar</label>
                            <div class="flex items-center">
                                <input type="file" id="image" name="image"
                                    class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg bg-black mb-4 overflow-hidden file:p-3 file:bg-background file:border-none file:text-white/70 file:border-r file:border-white/30">
                            </div>
                        @endif

                        @include('components.input', [
                            'label' => 'Nama',
                            'name' => 'name',
                        ])

                        @include('components.input', [
                            'label' => 'Bank',
                            'name' => 'bank',
                        ])

                        @include('components.input', [
                            'label' => 'No Rekening',
                            'name' => 'noRekening',
                        ])
                    </div>

                    <button class="p-2 bg-orange rounded text-white">Tambah Akun Bank</button>
                </form>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden  text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Akun Bank</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    @if ($user->role == 'admin')
                                        <td class="table-border">Gambar</td>
                                    @endif
                                    <td class="table-border">Nama</td>
                                    <td class="table-border">Bank</td>
                                    <td class="table-border">No Rekening</td>
                                    <td class="table-border">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($banks as $bank)
                                    <tr class="table-border">
                                        @if ($user->role == 'admin')
                                            <td class="table-border">
                                                <div class="w-20 h-12 m-auto bg-background rounded-lg bg-cover bg-center"
                                                    style="background-image: url('{{ asset('') }}storage/bank/{{ $bank->image }}');">
                                                </div>
                                            </td>
                                        @endif
                                        <td class="table-border">{{ $bank->name }}</td>
                                        <td class="table-border">{{ $bank->bank }}</td>
                                        <td class="table-border">{{ $bank->noRekening }}</td>
                                        <td class="table-border flex justify-center">
                                            <form
                                                action="{{ route('dashboard.admin.bank-accounts.destroy', ['id' => $bank->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="h-12 w-12 text-lg flex  justify-center items-center rounded bg-red-500">
                                                    <i class="bi bi-trash"></i>
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
                            <p>Menampilkan 1 sampai 10 dari 13 entri</p>
                        </div>
                        <div class="flex items-center gap-4 my-7">
                            <a href="" class="block">Sebelumnya</a>
                            <ul>
                                <li class="w-7 h-7 flex justify-center items-center  rounded bg-orange">1</li>
                            </ul>
                            <a href="" class="block">Berikutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
