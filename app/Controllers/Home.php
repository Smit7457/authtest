<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function Dashboard()
    {
        $data = '';
        $session = session();
        $sdata = session('data');
        if(!empty($sdata)){
            $data = $sdata;
        }
        
        if ($session->has('UserId')) {
            return view('Dashboard', ['data' => $data]);
        } else {
            $session->setFlashdata('msg', 'Please Login.');
            return redirect()->to('/login');
        }
    }
}