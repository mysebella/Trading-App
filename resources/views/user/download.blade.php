@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Download',
        'path' => ['Home', 'Download'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80">
        <div class="w-full mt-6 rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Download</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
                @include('components.print')

                <div class="w-[900px] lg:w-auto">
                    <table class="w-full table-border">
                        <thead>
                            <tr class="table-border">
                                <td class="table-border w-[20%]">Judul</td>
                                <td class="table-border w-[50%]">Info</td>
                                <td class="table-border">Hits</td>
                                <td class="table-border">Download</td>
                                <td class="table-border">File</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-border">
                                <td class="table-border">78 Ebook Marketing</td>
                                <td class="table-border">78 Ebook Marketing</td>
                                <td class="table-border">1</td>
                                <td class="table-border">
                                    <button class="px-3 py-1 bg-red-500 rounded">
                                        Belum Download
                                    </button>
                                </td>
                                <td class="table-border">
                                    <button class="px-3 py-1 bg-green rounded">
                                        Download
                                    </button>
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
