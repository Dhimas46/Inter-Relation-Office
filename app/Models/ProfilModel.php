<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
  protected $table = 'users';
  protected $allowedFields = ['username'];

  function getUsers($id = false)
  {
    if ($id===false) {
    return $this->select('users.id as userid, username, email, name')
    ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
    ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
    ->findAll();
  } else{
    return $this->where(['id'=>$id])->first();
  }
}
function getAll(){
  $builder = $this->db->table('users');
  $builder->select('users.id as userid, username, email, name');
  $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
  $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
  $query   = $builder->get();
  return $query->getResult();
}
function getPaginated($num, $keyword = null){
  $builder = $this->builder();
  $builder->select('users.id as userid, username, email, name');
  $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
  $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
  if ($keyword != '') {
    $builder->like('username', $keyword);
    $builder->orLike('name', $keyword);
  }
return [
    'users' => $this->paginate($num),
    'pager' =>$this->pager,
];
}
}
