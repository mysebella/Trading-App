@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Testimonial',
        'path' => ['Home', 'Testimonial'],
    ])

    <section class="w-full overflow-hidden rounded-lg text-white/80 my-6">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white/70 border-b border-white/25">
                <p>Testimonial</p>
            </div>

            <div class="p-4 lg:p-6 overflow-x-scroll">
            </div>
        </div>
    </section>
@endsection
