<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index()
    // {
    //     return view('welcome_message');
    // }

    public function Dashboard()
    {
        $session = session();
        if ($session->has('UserId')) {
            return view('Dashboard');
        } else {
            $session->setFlashdata('msg', 'Please Login.');
            return redirect()->to('/login');
        }
    }
}