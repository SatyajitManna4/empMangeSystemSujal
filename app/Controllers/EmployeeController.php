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
        return redirect()->to(base_url('employee'))->with('status','Employee Added Successfully');
    }

    public function edit($id){
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/edit', $data);
    }

    public function update($id){

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

        $model->update($id, $data);
        return redirect()->to(base_url('employee'))->with('status','Employee Updated Successfully');

    }
    public function delete($id){
        $employee = new EmployeeModel();
        $employee->delete($id);
        return redirect()->to(base_url('employee'))->with('status','Employee Deleted Successfully');

    }

    public function viewUser($id){
        $model = new EmployeeModel();
        $data['employee'] = $model->find($id);
        return view('employee/view_emp', $data);
    }

    public function login(){
        return view('auth/login');
    }

    public function doLogin(){
        
        $rules = [
            'email' => 'required|valid_email|is_not_unique[employees.email]',
            'password' => 'required|min_length[8]',
           
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new EmployeeModel();
        $user = $model->where('email', $email)->fist();

        if($user){
            if(password_verify($password, $user['password'])){
                session().set([
                    'id' -> user['id'],
                    'name'-> user['name'],
                    'email'->user['email'],
                    'logged_in' -> true
                ]);
                if(session()->get('logges_in') === true){
                    return redirect->to('employee');
                }
            }
            else{
                return redirect()->back()->withInput()->with('errors', 'Invalid Email or Password');
            }

        }else{
            return redirect()->back()->withInput()->with('errors', 'Invalid Email or Password');
        }


    }

    public function register(){
        return view('auth/register');
    }

    public function doRegister(){
        $rules = [
            'name' => 'required|min_length[2]|max_length[30]',
            'email' => 'required|valid_email|is_not_unique[employees.email]',
            'password' => 'required|min_length[8]',
           
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

    }
}