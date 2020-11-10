<?php namespace App\Controllers;
use App\Models\CourseModel;

class Home extends BaseController
{
	public function index()
	{
		$courseModel = new CourseModel();
		$data['course'] = $courseModel->orderBy('id', 'ASC')->findAll();

		return view('register-form-1', $data);
	}

}
