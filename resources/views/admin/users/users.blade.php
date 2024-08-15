@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Users',
        'path' => ['Home', 'Users'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>All Users</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Photo Profile</td>
                                <td class="table-border">Name</td>
                                <td class="table-border">Username</td>
                                <td class="table-border">Email</td>
                                <td class="table-border">IsActive</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) != 0)
                                @foreach ($users as $key => $user)
                                    <tr class="table-border">
                                        <td class="table-border">
                                            <img src="{{ asset('') }}storage/photo-profile/{{ $user->profile[0]->photoProfile }}"
                                                width="55" class="m-auto" />
                                        </td>
                                        <td class="table-border">{{ $user->name }}</td>
                                        <td class="table-border">{{ $user->username }}</td>
                                        <td class="table-border">{{ $user->email }}</td>
                                        <td class="table-border">
                                            <button
                                                class="{{ $user->status == 'actived' ? 'bg-green' : 'bg-red-500' }} first-letter:uppercase px-2 py-1 rounded">{{ $user->status == 1 ? 'active' : 'noactive' }}</button>
                                        </td>
                                        <td class="table-border">
                                            <a href="{{ route('dashboard.users.view', ['id' => $user->id]) }}"
                                                class="flex justify-center">
                                                <img src="https://hsbglobaltrade.com/images/view.png" />
                                            </a>
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
