<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
      $builder = $this->db->table('content');
      $query   = $builder->get();
      $data['content'] = $query->getResult();

        return view('welcome_message', $data);
    }
    public function register()
    {
        return view('auth/register');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function user()
    {
        return view('user/index');
    }
}
