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
        $user_id = $session->get('UserId');

        if (!$user_id) {
            return redirect()->to('/');
        }
        return view('Dashboard');
    }

}
