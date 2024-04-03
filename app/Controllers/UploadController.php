<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CURLFile;

class UploadController extends BaseController
{

    public function upload()
    {
        $file = $this->request->getFile('file');
    
        if ($file->isValid() && $file->getExtension() === 'pdf') {
            // Move the uploaded file to a desired directory
            $file->move(WRITEPATH . '../public/uploads', $file->getName());
    
            $upload_directory = WRITEPATH . '../public/uploads/'. $file->getName();

            // Check if the file exists in the upload directory
            if (file_exists($upload_directory)) {
                $data['message'] = "File uploaded successfully.";
                $data['response'] = true; 
            } else {
                $data['message'] = "Error uploading file.";
                $data['response'] = false;
            }

            // cURL call
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
                CURLOPT_POSTFIELDS => array(
                    'file' => new CURLFile($upload_directory)
                ),
                CURLOPT_HTTPHEADER => array(
                    'accept: application/json',
                    'Content-Type: multipart/form-data'
                ),
            ));
    
            $response = curl_exec($curl);
            echo "<pre>"; print_r($response); die();
            curl_close($curl);

            // Return a success message
            return redirect()->to('/dashboard')->with('response', $data);
        } else {
        

            $data['message'] = "Invalid file format!";
            $data['response'] = false;
            return redirect()->to('/dashboard')->with('response', $data);


        }
    }
    
}
