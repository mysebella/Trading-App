@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Add Testimonial',
        'path' => ['Setting', 'Add Testimonial'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6 textsm">
        <div class="w-full lg:w-[30%] rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Add Testimonial</p>
            </div>
            <div class="p-6">
                <form action="">
                    <label class="text-white/70" for="judul">Judul</label>
                    <input type="text" id="judul" name="judul"
                        class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">

                    <label class="text-white/70" for="Testimonials">Testimonials (max 350 chareacter)</label>
                    <textarea type="text" id="Testimonials" name="testimonials"
                        class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">
                    </textarea>

                    <label class="text-white/70" for="">Image</label>
                    <input type="file" class="text-white/70 mb-4" />

                    <p class="text-white/70 mb-4">Upload only file pdf, jpg, png, gif. Max size upload 1 MB.</p>

                    <button class="p-2 bg-orange rounded text-white">Send</button>
                </form>
                <div class="bg-blue-500 text-sm mt-4 p-4 rounded-lg text-white">
                    <p><i class="bi bi-info-circle-fill"></i> Notice:</p>
                    <p>Maks Testimonial 3 Testimonial.</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden bg-black text-white/80">
            <div class="w-full rounded-lg overflow-hidden bg-black">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Testimonial</p>
                </div>

                <div class="p-4 lg:p-6 overflow-x-scroll">
                    @include('components.print')

                    <div class="w-[900px] lg:w-auto">
                        <table class="w-full table-border">
                            <thead>
                                <tr class="table-border">
                                    <td class="table-border">Date</td>
                                    <td class="table-border w-[60%]">Subject</td>
                                    <td class="table-border">View</td>
                                    <td class="table-border">Edit</td>
                                    <td class="table-border">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-border">
                                    <td class="p-4">No data available in table</td>
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
