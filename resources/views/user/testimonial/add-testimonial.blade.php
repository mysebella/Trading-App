@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Add Testimonial',
        'path' => ['Setting', 'Add Testimonial'],
    ])

    <section class="my-6 w-full flex flex-col lg:flex-row gap-6 textsm">
        <div class="w-full lg:w-[30%] overflow-hidden ">
            <div class="bg-black rounded-lg">
                <div class="p-6 text-white/70 border-b border-white/25">
                    <p>Add Testimonial</p>
                </div>

                <div class="p-6">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="text-white/70" for="judul">Title</label>
                        <input type="text" id="judul" name="title"
                            class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">

                        <label class="text-white/70" for="Testimonials">Testimonials (max 350 chareacter)</label>
                        <textarea type="text" id="Testimonials" name="description"
                            class="text-white/50 w-full mt-2 border border-white/30 outline-none rounded-lg p-3 bg-black mb-4">
                        </textarea>

                        <label class="text-white/70">Image</label>
                        <input type="file" name="image" class="text-white/70 mb-4" />

                        <p class="text-white/70 mb-4">Upload only file pdf, jpg, png, gif. Max size upload 1 MB.</p>

                        <button class="p-2 bg-orange rounded text-white">Send</button>
                    </form>
                    <div class="bg-blue-500 text-sm mt-4 p-4 rounded-lg text-white">
                        <p><i class="bi bi-info-circle-fill"></i> Notice:</p>
                        <p>Maks Testimonial 3 Testimonial.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-[70%] rounded-lg overflow-hidden text-white/80">
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
                                    <td class="table-border">Subject</td>
                                    <td class="table-border">View</td>
                                    <td class="table-border">Edit</td>
                                    <td class="table-border">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($testimonis) != 0)
                                    @foreach ($testimonis as $testimoni)
                                        <tr class="table-border">
                                            <input type="hidden" name="imagev-{{ $testimoni->id }}"
                                                value="{{ $testimoni->image }}" />
                                            <input type="hidden" name="created_atv-{{ $testimoni->id }}"
                                                value="{{ $testimoni->created_at }}" />
                                            <input type="hidden" name="titlev-{{ $testimoni->id }}"
                                                value="{{ $testimoni->title }}" />
                                            <input type="hidden" name="userv-{{ $testimoni->id }}"
                                                value="{{ $testimoni->user->name }} ({{ $testimoni->user->username }})" />
                                            <input type="hidden" name="descriptionv-{{ $testimoni->id }}"
                                                value="{{ $testimoni->description }}" />

                                            <td class="table-border">{{ $testimoni->created_at }}</td>
                                            <td class="table-border">{{ $testimoni->title }}</td>
                                            <td class="table-border">
                                                <div class="flex justify-center" id="view-button">
                                                    <img src="https://hsbglobaltrade.com/images/view.png" />
                                                </div>
                                            </td>
                                            <td class="table-border">
                                                <a href="{{ route('testimonial.edit', ['id' => $testimoni->id]) }}"
                                                    class="flex justify-center">
                                                    <img src="https://hsbglobaltrade.com/images/edit_f2.png"
                                                        class="h-6" />
                                                </a>
                                            </td>
                                            <td class="table-border">
                                                <button
                                                    class="{{ $testimoni->status == 'success' ? 'bg-green' : 'bg-red-500' }} first-letter:uppercase px-2 py-1 rounded">{{ $testimoni->status }}</button>
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
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        const viewButtons = document.querySelectorAll('#view-button');
        viewButtons.forEach((el, index) => {
            el.addEventListener('click', function() {
                const image = document.querySelector(`input[name=imagev-${index + 1}]`)
                const created = document.querySelector(`input[name=created_atv-${index + 1}]`)
                const title = document.querySelector(`input[name=titlev-${index + 1}]`)
                const user = document.querySelector(`input[name=userv-${index + 1}]`)
                const description = document.querySelector(`input[name=descriptionv-${index + 1}]`)

                const html = `
                    <img src="/storage/testimoni/${image.value}"/>
                    <div style="text-align: start;" class="mt-4">
                        <p>By : ${user.value}</p>
                        <p>Date : ${created.value}</p>
                        <p class="mt-4">${title.value}</p>
                        <p>${description.value}</p>
                    </div>
                `

                Swal.fire({
                    html: html,
                });
            })
        });
    </script>
@endsection
