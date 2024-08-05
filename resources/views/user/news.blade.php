@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Latest News',
        'path' => ['Home', 'Latest News'],
    ])

    <section class="my-6 w-full">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-6 text-white border-b border-white/25">
                <p>Latest Notification</p>
            </div>
            <div class="text-white text-sm">
                <ul>
                    <li class="flex flex-col lg:flex-row items-center gap-6 hover:bg-white hover:text-black p-6">
                        <div
                            class="w-40 h-40 bg-background rounded-lg bg-[url(https://hsbglobaltrade.com/images/foto_berita/news-by_admin_2d7bd3a996550db0131cb98b3b370bdd_20220527_143734.jpg)] bg-cover">
                        </div>
                        <div class="w-[90%] text-white/70">
                            <p>
                                Technical Analysis at DailyFX
                                Trading may seem simple at surface level because almost every human being has the same
                                ability to open and close a trade. And given that the future is truly uncertain, it can seem
                                as though a new trader has the same chance of winning on any given trade as even the most
                                grizzled of market veterans. But with time and enough examples, it often becomes clear that
                                there is more to trading than just picking the right market and ‘guessing’ correctly a
                                certain number of times.
                                <br /><br />
                                There’s strategy, and technique, and a plethora of ways to go about ‘trying to see around
                                the next corner’ in order to attain desirable results. Like most other endeavors in life,
                                this usually takes time and experience for an individual to learn how to best do this for
                                themselves.
                                <br /><br />
                                One of the keys often incorporated along the way is technical analysis, or the premise of
                                using the chart and past price movements to help make trading decisions. Technical analysis
                                is simply an examination of the past, and this is often carried out with a chart to try to
                                identify patterns or scenarios that could give the trader ideas as to how to best move
                                forward in a given market.
                            </p>
                            <p class="mt-6">10-Aug-2022, 14:37:34</p>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
@endsection
