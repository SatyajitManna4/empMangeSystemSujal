<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index(){
        $model = new EmployeeModel();
        $data['employee'] = $model-> orderBy('created_at', 'DESC')->findAll();

        return view('employee/index', $data);
    }
    public function create(){
        return view('employee/create');
    }
    public function store(){

        $rules = [
            'name' => 'required|min_length[2]|max_length[30]',
            'email' => 'required|valid_email|is_unique[employees.email]',
            'phone' => 'required|numeric|max_length[10]',
            'designation' => 'required|max_length[50]',
            'salary' => 'required|numeric|greater_than[0]'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
            'salary' => $this->request->getPost('salary'),
            'access_level' => $this->request->getPost('access_level'),
            'status' => $this->request->getPost('status')

        ];
        $model->save($data);
        return redirect()->to(base_url('employees'))->with('status','Employee Added Successfully');
    }

    public function edit($id){
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/edit', $data);
    }

    public function update($id){

        $rules = [
            'name' => 'min_length[2]|max_length[30]',
            'email' => 'valid_email|is_not_unique[employees.email]',
            'phone' => 'numeric|max_length[10]',
            'designation' => 'max_length[50]',
            'salary' => 'numeric|greater_than[0]'
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new EmployeeModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
            'salary' => $this->request->getPost('salary'),
            'access_level' => $this->request->getPost('access_level'),
            'status' => $this->request->getPost('status')
        ];

        $model->update($id, $data);
        return redirect()->to(site_url('employees'))->with('status','Employee Updated Successfully');

    }
    public function delete($id){
        $employee = new EmployeeModel();
        $employee->delete($id);
        return redirect()->to(base_url('employees'))->with('status','Employee Deleted Successfully');

    }

    public function viewUser($id){
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/view_emp', $data);
    }

    

    

   
   
}