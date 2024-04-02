<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends BaseController
{

    public function index(): string
    {
        $session = session();
        $user_id = $session->get('UserId');

        if (!$user_id) {
            return view('login');
        }
        return view('login');
    }

    public function checklogin()
    {
        
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('Email');
        $password = $this->request->getVar('Password');
       
        $data = $userModel->where('Email', $email)->first();
    
        if($data){
            $pass = $data['Password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'UserId' => $data['UserId'],
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/login');
        }

    }
    

    public function logout(){

        $session = session();
        $session->destroy();
        
        return redirect()->to('/');
    }
}
