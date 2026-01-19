<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        $data['title'] = 'Users';
        return view('pages/users/index', $data);
    }

    // Show the create form
    public function create()
    {
        $data['title'] = 'Create User';
        return view('users/create', $data);
    }

    // Handle form submission
    public function store()
    {
        $validation = \Config\Services::validation();

        // Validation rules
        $validation->setRules([
            'name'  => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Save to database
        $this->userModel->insert([
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/users')->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);
        $data['title'] = 'Edit User';
        return view('pages/users/edit', $data);
    }

    public function update($id)
    {
        $this->userModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->to('/users')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('success', 'User deleted successfully!');
    }
}
