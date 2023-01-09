<?php
namespace App\Controllers;

use App\Models\AktivitasModel;

class Aktivitas extends BaseController
{
  protected $aktivitas;
  public function __construct()
  {
      $this->aktivitas = new AktivitasModel();
  }
  public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->aktivitas->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      return view('aktivitas/get', $data);
    }

    public function details($id = 0)
    {
      $builder = $this->db->table('content');
      $builder->select('id, judul, penulis, tgl, deskripsi, image');
      $builder->where('id', $id);
      $query   = $builder->get();
      $data['content'] = $query->getRow();
      if (empty($data['content'])) {
        return redirect()->to('/dashboard');
      }
        return view('content/details', $data);
    }
public function create()
  {
    $builder = $this->db->table('aktivitas');
    $query   = $builder->get();
    $data['aktivitas'] = $query->getResult();
    return view('aktivitas/add', $data );
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
          'uploaded' => 'Harus Ada File yang diupload',
          'mime_in' => 'File Extention Harus Berupa jpg,jpeg,pdf,png'
        ]
      ]
    ])) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->to(site_url('aktivitas/add'))->with('error', 'The Image Ekstension Must Be a JPG,JPEG,PNG');
    }
    $fileImage = $this->request->getFile('image');
    $namaImage = $fileImage->getRandomName();
    $fileImage->move('activities/', $namaImage);
    $this->aktivitas->save([
      'judul' => $this->request->getVar('judul'),
      'image' => $namaImage,
    ]);
    // $dataimage->move('image/', $fileName);
    session()->setFlashdata('success', 'Activities Data Saved Successfully');
    return redirect()->to(base_url('aktivitas'));
  }

  }
  public function edit($id = null)
    {
        if ($id != null) {
          $query = $this->db->table('aktivitas')->getWhere(['id' => $id]);
          if ($query->resultID->num_rows > 0) {
            $data['aktivitas'] = $query->getRow();
            return view ('aktivitas/edit', $data);
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
        $fileImage->move('activities/', $namaImage);
        unlink('activities/'. $this->request->getVar('imageLama'));
      }
       $data = [
         'judul' => $this->request->getVar('judul'),
         'image' => $namaImage
       ];
      unset($data['_method']);
      $this->db->table('aktivitas')->where(['id' => $id]) -> update($data);
      return redirect()->to(site_url('aktivitas'))->with('success', 'Activities Data Updated Successfully');
    }
public function destroy($id)
{
  //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
  $aktivitas = new AktivitasModel();
  $data = $aktivitas->find($id);
  $fileImage = $data->image;
  if (file_exists('activities/'.$fileImage)) {
      unlink('activities/'.$fileImage);
  }
  $aktivitas->delete($id);
  return redirect()->to(site_url('aktivitas'))->with('success', 'Activities Data Deleted Successfully');
}
  }
