@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Register',
        'path' => ['Setting', 'Register'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black h-96">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Register</p>
            </div>
            @include('components.unverified', ['label' => 'Transfer balance'])
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden bg-black text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Register History</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border w-[20%]">Username</td>
                                    <td class="table-border w-[20%]">Name</td>
                                    <td class="table-border w-[20%]">Email Address</td>
                                    <td class="table-border w-[20%]">Date</td>
                                    <td class="table-border w-[20%]">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-border">
                                    <td class="p-4">No data available in table</td>>
                                </tr>
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
