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
        return view('pages/users/create', $data);
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
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        return view('pages/users/edit', [
            'title' => 'Edit User',
            'user'  => $user,
        ]);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $this->userModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/users')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/users')->with('error', 'User not found.');
        }

        $this->userModel->delete($id);

        return redirect()->to('/users')->with('success', 'User deleted successfully.');
    }
}
