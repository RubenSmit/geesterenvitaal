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
            'site_subtitle' => 'Hier komt een mooie pakkende tekst',
            'dashboard_header_button_text' => 'meer over vitaal leven',
            'dashboard_header_button_id' => 1,
            'footer_contact' => 'Geesteren Vitaal',
            'footer_info' => 'Een initiatief van de dorpsraad geesteren.'
        ];

        View::share('site_settings', $this->site_settings);
    }
}
