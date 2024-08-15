@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Request Verification',
        'path' => ['Home', 'Request Verification'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>All Request Verification</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Photo Profile</td>
                                <td class="table-border">Name</td>
                                <td class="table-border">Username</td>
                                <td class="table-border">Email</td>
                                <td class="table-border w-[15%]"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($usera) != 0)
                                @foreach ($usera as $key => $usera)
                                    <tr class="table-border">
                                        <td class="table-border">
                                            <img src="{{ asset('') }}storage/photo-profile/{{ $usera->profile[0]->photoProfile }}"
                                                width="55" class="m-auto" />
                                        </td>
                                        <td class="table-border">{{ $usera->name }}</td>
                                        <td class="table-border">{{ $usera->username }}</td>
                                        <td class="table-border">{{ $usera->email }}</td>
                                        <td class="table-border">
                                            <div class="flex" style="color: white;">
                                                <form method="POST"
                                                    action="{{ route('dashboard.users.update', ['id' => $usera->id]) }}"
                                                    class="w-full">
                                                    @csrf
                                                    @method('PUT')
                                                    <button id="button-password" class="bg-green py-3 w-20 rounded-lg  mt-2"
                                                        name="status" value="actived">Approve</button>
                                                </form>
                                                <form method="POST"
                                                    action="{{ route('dashboard.users.update', ['id' => $usera->id]) }}"
                                                    class="w-full">
                                                    @csrf
                                                    @method('PUT')
                                                    <button id="button-password"
                                                        class="bg-red-500 py-3 w-20 rounded-lg  mt-2" name="status"
                                                        value="noactived">Reject</button>
                                                </form>
                                            </div>
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
