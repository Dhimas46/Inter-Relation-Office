<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->user = new UsersModel();
    }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->user->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      // $data = [
      //   'users' => $this->usersModel->getAll(),
      //   'pager' => $this->usersModel->pager
      // ];
        return view('admin/user_list', $data);
    }
    public function detail($id = 0)
    {
      $builder = $this->db->table('users');
      $builder->select('users.id as userid, username,nim,telp,tempat,tgl_lahir, fullname, image, email, name');
      $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
      $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
      $builder->where('users.id', $id);
      $query   = $builder->get();
      $data['user'] = $query->getRow();
      if (empty($data['user'])) {
        return redirect()->to('/admin');
      }
        return view('admin/detail', $data);
    }
    public function update($id)
    {
      $builder = $this->db->table('auth_groups_users');
       $data = [
         'group_id' => $this->request->getVar('group_id')
       ];
      unset($data['_method']);
      $this->db->table('auth_groups_users')->where(['user_id' => $id]) -> update($data);
      return redirect()->to(site_url('admin/'.$id))->with('success', 'Profile Data Updated Successfully');
    }
}
