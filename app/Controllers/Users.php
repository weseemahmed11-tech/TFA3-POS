<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('partials/header', ['title' => 'User Accounts'])
            . view('users/index', ['users' => $users])
            . view('partials/footer');
    }
}
