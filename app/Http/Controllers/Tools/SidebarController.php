<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;

class SidebarController extends Controller
{
    public static function user()
    {
        return [
            [
                "icon" => '<i class="bi bi-house-door"></i>',
                "name" => "Dashboard",
                "route" => 'home'
            ],
            [
                "icon" => '<i class="bi bi-gear-fill"></i>',
                "name" => "Setting",
                "route" => 'setting',
                "sub" => [
                    [
                        "name" => "Profile",
                        "route" => 'setting.profile'
                    ],
                    [
                        "name" => "Image",
                        "route" => 'setting.image'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-shield-shaded"></i>',
                "name" => "Security",
                "route" => 'security'
            ],
            [
                "icon" => '<i class="bi bi-person-vcard-fill"></i>',
                "name" => "KNC",
                "route" => 'knc'
            ],
            [
                "icon" => '<i class="bi bi-check2-circle"></i>',
                "name" => "Investment",
                "route" => 'investment'
            ],
            [
                "icon" => '<i class="bi bi-graph-up"></i>',
                "name" => "Trade",
                "route" => 'trade',
                "sub" => [
                    [
                        "name" => "Trade",
                        "route" => 'trade'
                    ],
                    [
                        "name" => "History",
                        "route" => 'trade.history'
                    ],
                    [
                        "name" => "Profits",
                        "route" => 'trade.profits'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-cash"></i>',
                "name" => "Funds",
                "route" => 'fund',
                "sub" => [
                    [
                        "name" => "Bonus",
                        "route" => 'fund.bonus'
                    ],
                    [
                        "name" => "Profits",
                        "route" => 'fund.profits'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-wallet-fill"></i>',
                "name" => "Wallet",
                "route" => 'wallet',
                "sub" => [
                    [
                        "name" => "Balance",
                        "route" => 'wallet.balance'
                    ],
                    [
                        "name" => "Add Balance",
                        "route" => 'wallet.add-balance'
                    ],
                    [
                        "name" => "Transfer",
                        "route" => 'wallet.transfer'
                    ],
                    [
                        "name" => "Withdraw",
                        "route" => 'wallet.withdraw'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-diagram-3-fill"></i>',
                "name" => "Network",
                "route" => 'network',
                "sub" => [
                    [
                        "name" => "Refferals",
                        "route" => 'network.refferals'
                    ],
                    [
                        "name" => "Generation",
                        "route" => 'network.generation'
                    ]
                ]
            ],
            [
                "icon" => '<i class="fa fa-pencil-square-o"></i>',
                "name" => "Register",
                "route" => 'register'
            ],
            [
                "icon" => '<i class="bi bi-question-circle-fill"></i>',
                "name" => "FAQ",
                "route" => 'faq'
            ],
            [
                "icon" => '<i class="fa fa-newspaper-o"></i>',
                "name" => "Latest News",
                "route" => 'news'
            ],
            [
                "icon" => '<i class="fa fa-comments"></i>',
                "name" => "Testimonial",
                "route" => 'testimonial',
                "sub" => [
                    [
                        "name" => "Testimonial",
                        "route" => 'testimonial.testimonial'
                    ],
                    [
                        "name" => "Add Testimonial",
                        "route" => 'testimonial.add-testimonial'
                    ]
                ]
            ],
            [
                "icon" => '<i class="fa fa-download"></i>',
                "name" => "Download",
                "route" => 'download'
            ],
            [
                "icon" => '<i class="fa fa-power-off"></i>',
                "name" => "Log Out",
                "route" => 'logout'
            ],
        ];
    }

    public static function admin()
    {
        return [
            [
                "icon" => '<i class="bi bi-house-door"></i>',
                "name" => "Dashboard",
                "route" => 'dashboard.home'
            ],
            [
                "icon" => '<i class="bi bi-people-fill"></i>',
                "name" => "Users",
                "route" => 'dashboard.users'
            ],
            [
                "icon" => '<i class="bi bi-bag-fill"></i>',
                "name" => "Product",
                "route" => 'product',
                "sub" => [
                    [
                        "name" => "Request Investment",
                        "route" => 'dashboard.product.request-investment'
                    ],
                    [
                        "name" => "Investment Package",
                        "route" => 'dashboard.product.add-investment'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-cash"></i>',
                "name" => "Balance",
                "route" => 'balance',
                "sub" => [
                    [
                        "name" => "Request Balance",
                        "route" => 'dashboard.balance.request-balance'
                    ],
                    [
                        'name' => 'Request Withdraw',
                        "route" => 'dashboard.balance.request-withdraw'
                    ]
                ]
            ],
            [
                "icon" => '<i class="bi bi-person-workspace"></i>',
                "name" => "Admin",
                "route" => 'admin',
                "sub" => [
                    [
                        "name" => "Account Bank",
                        "route" => 'dashboard.admin.add-account-bank'
                    ]
                ]
            ],
            [
                "icon" => '<i class="fa fa-power-off"></i>',
                "name" => "Log Out",
                "route" => 'logout'
            ],
        ];
    }
}
