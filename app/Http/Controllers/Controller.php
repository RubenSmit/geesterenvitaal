<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $site_settings;

    public function __construct()
    {
        $this->site_settings = [
            'nav_items' => Page::navigation()->get(),
            'footer_items' => Page::footer()->get(),
            'site_title' => 'Geesteren Vitaal',
            'site_subtitle' => 'Pak de fiets, bewandel één van de wandelroutes of sla een balletje met je ‘noaber’.',
            'dashboard_header_button_text' => 'waarom vitaal leven?',
            'dashboard_header_button_id' => 1,
            'dashboard_activity_button_text' => 'doe jij mee?',
            'footer_contact' => 'Geesteren Vitaal',
            'footer_info' => 'Een initiatief van de dorpsraad geesteren.',
            'action_header_button_text' => 'hoe spaar ik punten?',
            'action_header_button_id' => 5,
            ];

        View::share('site_settings', $this->site_settings);
    }
}
