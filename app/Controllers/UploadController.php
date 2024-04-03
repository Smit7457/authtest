<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CURLFile;

class UploadController extends BaseController
{

    public function upload()
    {
        $file = $this->request->getFile('file');
        if(empty($file->getName())){
            $data['message'] = "Please Upload File.";
            $data['response'] = false;
            return redirect()->to('/dashboard')->with('data', $data);
        }

        if ($file->isValid() && $file->getExtension() === 'pdf') {

            $file->move(WRITEPATH . '../public/uploads', $file->getName());    
            $upload_directory = WRITEPATH . '../public/uploads/'. $file->getName();

            if (file_exists($upload_directory)) {
                $data['message'] = "File uploaded successfully.";
                $data['response'] = true; 
            } else {
                $data['message'] = "Error uploading file.";
                $data['response'] = false;
            }

            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://143.198.236.134:8001/api/v1/extract-data',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'file' => new CURLFile($upload_directory, 'application/pdf', basename($upload_directory))
                ],
                CURLOPT_HTTPHEADER => array(
                    'accept: application/json',
                    'Content-Type: multipart/form-data'
                ),
            ));

            $response = curl_exec($curl);
            $data['record'] = $response;
            curl_close($curl);
            unlink($upload_directory);

            return redirect()->to('/dashboard')->with('data', $data);
        } else {
            $data['message'] = "Invalid file format!";
            $data['response'] = false;
            return redirect()->to('/dashboard')->with('data', $data);
        }
    }
    
}
