<?php

namespace App\Controllers;
use App\Models\ProfilModel;

class User extends BaseController
{
  protected $profileModel;
  public function __construct()
  {
      $this->profil = new ProfilModel();
  }
    public function index()
    {
        return view('user/index');
    }
    public function course()
    {
        return view('course/get');
    }

    public function profil($id = 0)
    {
      $builder = $this->db->table('users');
      $builder->select('*');
      $builder->where('id', $id);
      $query   = $builder->get();
      $data['profil'] = $query->getRow();
      if (empty($data['profil'])) {
        return redirect()->to('/dashboard');
      }
        return view('profil/get', $data);
    }
    public function update($id)
    {

      $fileImage  = $this->request->getFile('image');
      if ($fileImage->getError() == 4) {
        $namaImage = $this->request->getVar('imageLama');
      } else{
        $namaImage = $fileImage->getRandomName();
        $fileImage->move('image/', $namaImage);
      }
       $data = [
         'fullname' => $this->request->getVar('fullname'),
         'nim' => $this->request->getVar('nim'),
         'prodi' => $this->request->getVar('prodi'),
         'telp' => $this->request->getVar('telp'),
         'tempat' => $this->request->getVar('tempat'),
         'email' => $this->request->getVar('email'),
         'tgl_lahir' => $this->request->getVar('tgl_lahir'),
         'username' => $this->request->getVar('username'),
         'image' => $namaImage
       ];
      unset($data['_method']);
      $this->db->table('users')->where(['id' => $id]) -> update($data);
      return redirect()->to(site_url('profil/'.$id))->with('success', 'Profile Data Updated Successfully');
    }
}
