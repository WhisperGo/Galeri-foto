<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'GT Gallery - Dashboard';

        echo view('photofolio/partial/header', $data);
        echo view('photofolio/partial/top_menu');
        echo view('photofolio/dashboard/view');
        echo view('photofolio/partial/footer');
    }
}
