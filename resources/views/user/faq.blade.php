@extends('_layout.main')

@section('content')
    @include('components.page-indicator', [
        'page' => 'Frequently Asked Questions (FAQ)',
        'path' => ['Home', 'FAQ'],
    ])

    <section class="mt-4 w-full overflow-hidden rounded-lg text-sm text-white/80">
        <div class="w-full rounded-lg overflow-hidden bg-black">
            <div class="p-4 lg:p-6 overflow-x-scroll">
                <div class="bg-background rounded-lg p-4">
                    @include('components.faq-item', [
                        'label' => 'What are the additional fees?',
                        'description' => 'There are no additional fees charged.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'When does the market open for trading investment?',
                        'description' =>
                            'The forex market is open 24 hours daily in several parts of the globe, from 5 p.m. EST on Sunday until 4 p.m. EST on Friday. the flexibility of the forex to trade invest over 24 hours is due partially to different international time zones.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How to manage my risk?',
                        'description' =>
                            'The limit orders and the stop-loss orders are the most common risk management tools in Forex Trading Investment. A limit order helps to restrict the minimum price to be received or a maximum price to be paid. Stop-loss orders are used to set a position to be involuntarily liquidated at a present price to limit possible losses that the market should move against an investor’s position.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What type of account do you offer?',
                        'description' =>
                            'We have a wide range of account types. You can explore the account types here and choose the one that suits you.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Is there any minimum trading investment volume?',
                        'description' => 'You can trade with as low as few dollars using our micro-accounts',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What is spread?',
                        'description' =>
                            'Spread is a difference between the bid and ask price of the base currency.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How can I open a trading investment account?',
                        'description' =>
                            'You can open two types of accounts- Demo account and live account. In the demo account, you will get virtual money through with you can trade and learn virtually. In live account first, you need to deposit funds to trade  invest',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How to login to the trading investment platform?',
                        'description' =>
                            'Upon registering you will get a username and password through which you can log in into your account.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Is any document required to open an account with Daxtradefx?',
                        'description' =>
                            'To open an account following documents will be required: <br/> - Identification proof like passport or driving license. <br/> -  Residential proof',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How many accounts can I open?',
                        'description' =>
                            'Daxtradefx offers three base currencies in which you can trade invest. You can have multiple accounts for each base currency.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What leverage is applied to my account?',
                        'description' => 'Your account can have a maximum of 1:1000 leverage.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How can I verify my account?',
                        'description' => 'How can I verify my account?',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How can I open an account?',
                        'description' =>
                            'To open an account with Daxtradefx you need to provide us with some necessary information and submit some identification documents.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How can I deposit funds into my account?',
                        'description' =>
                            'First, you need to go through our security and identification documents and then you can deposit funds into your account using a variety of different methods including bank transfer, bitcoin & many more.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'How can I withdraw money?',
                        'description' =>
                            'To do so you need to fill our security and identification documents and select the amount you wish to withdraw.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Do you offer Islamic accounts?',
                        'description' => 'Yes, we do offer it.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What spreads do you offers?',
                        'description' =>
                            'We offer variable spreads that may be as low as 0.0 pips. We have got no re-quoting: our clients are given directly the value that our system receives.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What leverage do you offer?',
                        'description' =>
                            'Leverage offered for Daxtradefx trading accounts is up to 1:1000 depending on the account type.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Do you allow scalping?',
                        'description' => 'Yes, we allow scalping.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'What is stop loss?',
                        'description' =>
                            '- Stop-loss is an order for closing a previously opened position at a price less profitable for the client than the worth at the time of placing the stop loss. Stop loss could be a limit that you simply set to your order. <br/> - Once this limit is reached, your order is closed. Please note that you just must leave certain distances from the present market value after you founded stop/limit orders. For further details about the gap in points for every currency pair, please view the limit and stop levels here.<br/> - Using stop loss is beneficial if you would like to reduce your losses when the market goes against you. Stop-loss points are always set below the present damage on BUY, or above the present ASK price on SELL.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Do you allow hedging?',
                        'description' =>
                            '- Yes, we do. You are liberated to hedge your positions on your trading investment account. Hedging takes place after you open a protracted and a brief position on the identical instrument simultaneously. once you open a BUY and a SELL position on the identical instrument and within the same lot size, the margin is 0. <br/> - However, after you open a BUY and a SELL position on a CFD of the identical type and lot size, the margin is merely needed once, and it will be seen here. The margin of CFDs, once you are hedged, is usually 50%.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'Can I change my leverage? If yes then how?',
                        'description' =>
                            'Yes, under the My Account tab, you can change the leverage, and then press the Change Leverage button in our Members section. That is the instant leverage change method.',
                    ])
                    @include('components.faq-item', [
                        'label' => 'I still have questions.',
                        'description' => 'For further queries, you can contact us on our email and contact no.',
                    ])
                </div>
            </div>
        </div>
    </section>
@endsection
