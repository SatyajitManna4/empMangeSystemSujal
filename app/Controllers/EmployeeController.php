<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class EmployeeController extends BaseController
{
    public function index(){
        $model = new EmployeeModel();
        $data['employee'] = $model->findAll();

        return view('employee/index', $data);
    }
    public function create(){
        return view('employee/create');
    }
    public function store(){
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
        return redirect()->to(base_url('employee'))->with('status','Employee Added Successfully');
    }

    public function edit($id){
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/edit', $data);
    }

    public function update($id){
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
        return redirect()->to(base_url('employee'))->with('status','Employee Updated Successfully');

    }
    public function delete($id){
        $employee = new EmployeeModel();
        $employee->delete($id);
        return redirect()->to(base_url('employee'))->with('status','Employee Deleted Successfully');

    }
}