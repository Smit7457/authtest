<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);
    }
  
    public function store()
    {
        $session = session();
        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'Name' => $this->request->getVar('name'),
                'Email' => $this->request->getVar('email'),
                'Mobile' => $this->request->getVar('mobile'),
                'Password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            // echo '<pre>'; print_r($data); exit();
            $userModel->save($data);
            $lastInsertId = $userModel->insertID();

            if ($userModel) {
            
                $ses_data = [
                    'UserId' => $lastInsertId,
                ];

                $session->set($ses_data);
                return redirect()->to('/dashboard');

            }else {
                echo 'error';
            }
            // return redirect()->to('/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}