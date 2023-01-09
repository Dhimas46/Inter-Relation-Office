<?php
namespace App\Controllers;

use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
  protected $pengumuman;
  public function __construct()
  {
      $this->pengumuman = new PengumumanModel();
  }
  public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->pengumuman->getPaginated(3, $keyword);
      $data['keyword'] = $keyword;
      return view('pengumuman/get', $data);
    }

    public function details($id = 0)
    {
      $builder = $this->db->table('pengumuman');
      $builder->select('id, judul, penulis, tgl, deskripsi, image');
      $builder->where('id', $id);
      $query   = $builder->get();
      $data['pengumuman'] = $query->getRow();
      if (empty($data['pengumuman'])) {
        return redirect()->to('/dashboard');
      }
        return view('pengumuman/details', $data);
    }
public function create()
  {
    return view('pengumuman/add');
  }
  public function save(){
    {
    if (!$this->validate([
      'judul' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Tidak boleh kosong'
        ]
      ],
      'image' => [
        'rules' => 'uploaded[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'uploaded' => 'There must be a file uploaded',
          'mime_in' => 'The file extension must be an image (jpg,jpeg,png)'
        ]
      ]
    ])) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->to(site_url('pengumuman/add'))->with('error', 'There must be a file uploaded or The file extension must be an image (jpg,jpeg,png)');
    }
    $fileImage = $this->request->getFile('image');
    $namaImage = $fileImage->getRandomName();
    $fileImage->move('pengumuman_data/', $namaImage);
    $this->pengumuman->save([
      'judul' => $this->request->getVar('judul'),
      'image' => $namaImage,
      'deskripsi' => $this->request->getVar('deskripsi'),
      'penulis' => $this->request->getVar('penulis'),
      'tgl' => $this->request->getVar('tgl'),
      'prodi' => $this->request->getVar('prodi'),
    ]);
    // $dataimage->move('image/', $fileName);
    session()->setFlashdata('success', 'Announcement Data Saved Successfully');
    return redirect()->to(base_url('announcement'));
  }

  }
  public function edit($id = null)
    {
        if ($id != null) {
          $query = $this->db->table('pengumuman')->getWhere(['id' => $id]);
          if ($query->resultID->num_rows > 0) {
            $data['pengumuman'] = $query->getRow();
            return view ('pengumuman/edit', $data);
          } else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
          }
        } else {
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update($id)
    {

      $fileImage  = $this->request->getFile('image');
      if ($fileImage->getError() == 4) {
        $namaImage = $this->request->getVar('imageLama');
      } else{
        $namaImage = $fileImage->getRandomName();
        $fileImage->move('pengumuman_data/', $namaImage);
        unlink('pengumuman_data/'. $this->request->getVar('imageLama'));
      }
       $data = [
         'penulis' => $this->request->getVar('penulis'),
         'tgl' => $this->request->getVar('tgl'),
         'judul' => $this->request->getVar('judul'),
         'deskripsi' => $this->request->getVar('deskripsi'),
         'prodi' => $this->request->getVar('prodi'),
         'image' => $namaImage
       ];
      unset($data['_method']);
      $this->db->table('pengumuman')->where(['id' => $id]) -> update($data);
      return redirect()->to(site_url('announcement'))->with('success', 'Announcement Data Updated Successfully');
    }
public function destroy ($id)
{
  //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
  $pengumuman = new PengumumanModel();
  $data = $pengumuman->find($id);
  $fileImage = $data->image;
  if (file_exists('pengumuman_data/'.$fileImage)) {
      unlink('pengumuman_data/'.$fileImage);
  }
  $pengumuman->delete($id);
  return redirect()->to(site_url('announcement'))->with('success', 'Announcement Data Deleted Successfully');
}
  }
