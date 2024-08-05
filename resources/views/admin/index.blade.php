@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Dashboard Admin',
        'subpage' => 'Control Panel',
        'path' => ['Home', 'Dashboard Admin'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-4">
        <div class="rounded-lg w-full overflow-hidden hover:scale-105 duration-300">
            <div class="bg-black p-4 w-full" style="background-image: url({{ asset('') }}images/pattern.svg);">
                <div class="text-white/80">
                    <div class="flex gap-4 items-center flex-col lg:flex-row lg:text-start text-center">
                        <svg class="text-orange" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                            height="36px" width="36px" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5">
                            </path>
                        </svg>
                        <div class="text-white/70 tracking-wide">
                            <p class="font-bold text-xl">New User</p>
                            <p>total New User</p>
                        </div>
                    </div>
                    <div class="flex text-orange items-center justify-between mt-4">
                        <p class="text-xl font-semibold">12 User</p>
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-black overflow-hidden">
                <canvas class="opacity-60" id="chartjs1" width="400" height="100"></canvas>
            </div>
        </div>

        <div class="rounded-lg w-full overflow-hidden hover:scale-105 duration-300">
            <div class="bg-black p-4 w-full" style="background-image: url({{ asset('') }}images/pattern.svg);">
                <div class="text-white/80">
                    <div class="flex gap-4 items-center flex-col lg:flex-row lg:text-start text-center">
                        <svg class="text-orange" stroke="currentColor" fill="currentColor" stroke-width="0"
                            viewBox="0 0 16 16" height="36px" width="36px" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5">
                            </path>
                        </svg>
                        <div class="text-white/70 tracking-wide">
                            <p class="font-bold text-xl">Total User</p>
                            <p>total User</p>
                        </div>
                    </div>
                    <div class="flex text-orange items-center justify-between mt-4">
                        <p class="text-xl font-semibold">122 User</p>
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-black overflow-hidden">
                <canvas class="opacity-60" id="chartjs2" width="400" height="100"></canvas>
            </div>
        </div>

        <div class="rounded-lg w-full overflow-hidden hover:scale-105 duration-300">
            <div class="bg-black p-4 w-full" style="background-image: url({{ asset('') }}images/pattern.svg);">
                <div class="text-white/80">
                    <div class="flex gap-4 items-center flex-col lg:flex-row lg:text-start text-center">
                        <svg stroke="currentColor" class="text-orange" fill="currentColor" stroke-width="0"
                            viewBox="0 0 640 512" height="36px" width="36px" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M352 288h-16v-88c0-4.42-3.58-8-8-8h-13.58c-4.74 0-9.37 1.4-13.31 4.03l-15.33 10.22a7.994 7.994 0 0 0-2.22 11.09l8.88 13.31a7.994 7.994 0 0 0 11.09 2.22l.47-.31V288h-16c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8h64c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 192c-53.02 0-96-50.15-96-112 0-61.86 42.98-112 96-112s96 50.14 96 112c0 61.87-43 112-96 112zm272 32h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z">
                            </path>
                        </svg>
                        <div class="text-white/70 tracking-wide">
                            <p class="font-bold text-xl">Revenue</p>
                            <p>total Revenue</p>
                        </div>
                    </div>
                    <div class="flex text-orange items-center justify-between mt-4">
                        <p class="text-xl font-semibold">RM 100.00</p>
                        <a href="">Detail</a>
                    </div>
                </div>
            </div>
            <div class="bg-black overflow-hidden">
                <canvas class="opacity-60" id="chartjs3" width="400" height="100"></canvas>
            </div>
        </div>
    </section>

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Latest Trade</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border">Date</td>
                                <td class="table-border">No</td>
                                <td class="table-border">Package</td>
                                <td class="table-border">Market</td>
                                <td class="table-border">Amount</td>
                                <td class="table-border">Date End</td>
                                <td class="table-border">Status</td>
                                <td class="table-border">Win/Lost</td>
                                <td class="table-border">Rate Trade</td>
                                <td class="table-border">Rate End</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-border">
                                <td class="table-border">2024-05-23 11:15:31</td>
                                <td class="table-border">588NY6NR2YZ2</td>
                                <td class="table-border">30 SECOND</td>
                                <td class="table-border">BTC/USD</td>
                                <td class="table-border">RM 2,500.00</td>
                                <td class="table-border">2024-05-23 11:16:01</td>
                                <td class="table-border"><button class="bg-green rounded px-3 py-1">win</button></td>
                                <td class="table-border">RM 4,500.00 180%</td>
                                <td class="table-border">47,712.31 USD</td>
                                <td class="table-border win"><i class="bi bi-arrow-up-circle-fill"></i> 47,712.31 USD</td>
                            </tr>
                            <tr class="table-border">
                                <td class="table-border">2024-05-23 11:15:31</td>
                                <td class="table-border">588NY6NR2YZ2</td>
                                <td class="table-border">30 SECOND</td>
                                <td class="table-border">BTC/USD</td>
                                <td class="table-border">RM 2,500.00</td>
                                <td class="table-border">2024-05-23 11:16:01</td>
                                <td class="table-border"><button class="bg-red-500 rounded px-3 py-1">Lose</button></td>
                                <td class="table-border">RM 4,500.00 180%</td>
                                <td class="table-border">47,712.31 USD</td>
                                <td class="table-border lose"><i class="bi bi-arrow-down-circle-fill"></i> 47,712.31 USD
                                </td>
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
    </section>
@endsection

@section('javascript')
    <script src="{{ asset('') }}js/chart.js"></script>
@endsection
