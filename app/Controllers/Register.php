<?php namespace App\Controllers;
use App\Models\CourseModel;
use App\Models\RegisterModel;
 
use CodeIgniter\Controller;

class Register extends Controller{
	public function saveform1(){
        $validation =  \Config\Services::validation();
        $emailx = \Config\Services::email();

        $email  = $this->request->getVar('email');
        $name  = $this->request->getVar('name');
        $program  = $this->request->getVar('program');
        $nic  = $this->request->getVar('nic');
        $number  = $this->request->getVar('number');
        $age  = $this->request->getVar('age');
        $district  = $this->request->getVar('district');
        $divisional_secretariat  = $this->request->getVar('divisional-secretariat');
        $occupation  = $this->request->getVar('occupation');
        $workplace  = $this->request->getVar('workplace');
        $workplace_address  = $this->request->getVar('workplace-address');
        $highest_education_qualifications = $this->request->getVar('highest-education-qualifications');

        // Load Files
        $validated = $this->validate([
            'file-nic' => [
                'uploaded[file-nic]',
                'mime_in[file-nic,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file-nic,20000]',
            ],

            'file-birth-certificate' => [
                'uploaded[file-birth-certificate]',
                'mime_in[file-birth-certificate,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file-birth-certificate,20000]',
            ],
        ]);

        $validated1 = $this->validate([
            'file-ol' => [
                'uploaded[file-ol]',
                'mime_in[file-ol,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file-ol,20000]',
            ],
        ]);

        $validated2 = $this->validate([
            'file-al' => [
                'uploaded[file-al]',
                'mime_in[file-al,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
                'max_size[file-al,20000]',
            ],
        ]);

        // Save in folder
        if ($validated) {
            $file = $this->request->getFile('file-nic');
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/', $fileName);

            $file1 = $this->request->getFile('file-birth-certificate');
            $fileName1 = $file1->getRandomName();
            $file1->move(ROOTPATH . 'public/uploads/', $fileName1);
        }

        if($validated1){
            $file2 = $this->request->getFile('file-ol');
            $fileName2 = $file2->getRandomName();
            $file2->move(ROOTPATH . 'public/uploads/', $fileName2);
        }
        else{
            $fileName2 = "n/a";
        }

        if($validated2){
            $file3 = $this->request->getFile('file-al');
            $fileName3 = $file3->getRandomName();
            $file3->move(ROOTPATH . 'public/uploads/', $fileName3);
        }
        else{
            $fileName3 = "n/a";
        }

		$courseModel = new CourseModel();
		$registerModel = new RegisterModel();

        // Set student number
        $studentNumber = "";

        $courseDB = $courseModel->where('id', $program)->find();
		$register_list = $registerModel->where('courseid', $program)->findAll();

        $count = sizeof($register_list) + 1;
        $code = "";

        foreach($courseDB as $obj){
            $code = $obj['code'];
        }

        $count = sprintf("%04d", $count);
        $studentNumber = $code . $count;

        // Save in DB
        $data = [
            'courseid' => $program,
            'email' => $email,
            'name' => $name,
            'nic' => $nic,
            'number' => $number,
            'age' => $age,
            'district' => $district,
            'divisional_secretariat' => $divisional_secretariat,
            'occupation' => $occupation,
            'workplace' => $workplace,
            'workplace_address' => $workplace_address,
            'highest_education_qualifications' => $highest_education_qualifications,
            'file_nic' => $fileName,
            'file_birth_certificate' => $fileName1,
            'file_ol' => $fileName2,
            'file_al' => $fileName3,
            'file_payment' => 'n/a',
            'student_number' => $studentNumber,
        ];
        $save = $registerModel->insert($data);        
        
        // Send the email
        $nameEmail = "IOLPS";
        $fromemail = "hariharansliit@gmail.com";
        $subject = "IOLPS Registration";
        $message = "The student number is: " . $studentNumber;

        // Set Email Properties
        $emailx->setFrom($fromemail,$nameEmail);
        $emailx->setTo($email);
        $emailx->setSubject($subject);
        $emailx->setMessage($message);

        if ($emailx->send()) {
            $data['success'] = "Successfully sent message!";
            // echo $data['success'];
        } else {
            echo $emailx->printDebugger();
            $data['error'] = "Failed to send message!";
            // echo $data['error'];
        }
        return view('register-form-2');
    }

    public function paymentform(){
        return view('register-form-2');
    }

	public function saveform2(){
        $student_number  = $this->request->getVar('student_number');
        $registerModel = new RegisterModel();
		$register_list = $registerModel->where('student_number', $student_number)->findAll();

        if(sizeof($register_list) == 1){
            // Valid student number
            $data['err'] = 0;

            $validated = $this->validate([
	            'file-payment' => [
	                'uploaded[file-payment]',
	                'mime_in[file-payment,image/jpg,image/jpeg,image/gif,image/png,application/pdf]',
	                'max_size[file-payment,20000]',
	            ]
	        ]);
			
			if ($validated) {
	        	$file = $this->request->getFile('file-payment');
		        $fileName = $file->getRandomName();
		        $file->move(ROOTPATH . 'public/uploads/', $fileName);
            }
            
            foreach($register_list as $obj){
                $id = $obj['id'];
            }

            $data = [
	            'file_payment' => $fileName,
	        ];
	        $save = $registerModel->update($id, $data);
        }
        else{
            // Invalid student number
            $data['err'] = 1;
            $data['msg'] = "Error!!! Invalid student id";
        }

        return view('form-2-result', $data);
    }
}