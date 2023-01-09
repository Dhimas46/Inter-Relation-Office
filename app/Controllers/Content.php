<?php
namespace App\Controllers;

use App\Models\ContentModel;

class Content extends BaseController
{
  protected $contentModel;
  public function __construct()
  {
      $this->contentModel = new ContentModel();
  }
  public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->contentModel->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      return view('content/get', $data);
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
    $builder = $this->db->table('content');
    $query   = $builder->get();
    $data['content'] = $query->getResult();
    return view('content/add', $data );
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
      return redirect()->to(site_url('content/add'))->with('error', 'The Image Ekstension Must Be a JPG,JPEG,PNG');
    }
    $fileImage = $this->request->getFile('image');
    $namaImage = $fileImage->getRandomName();
    $fileImage->move('konten/', $namaImage);
    $this->contentModel->save([
      'judul' => $this->request->getVar('judul'),
      'image' => $namaImage,
      'deskripsi' => $this->request->getVar('deskripsi'),
      'penulis' => $this->request->getVar('penulis'),
      'tgl' => $this->request->getVar('tgl'),
    ]);
    // $dataimage->move('image/', $fileName);
    session()->setFlashdata('success', 'Content Data Saved Successfully');
    return redirect()->to(base_url('content'));
  }

  }
  public function edit($id = null)
    {
        if ($id != null) {
          $query = $this->db->table('content')->getWhere(['id' => $id]);
          if ($query->resultID->num_rows > 0) {
            $data['content'] = $query->getRow();
            return view ('content/edit', $data);
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
        $fileImage->move('konten/', $namaImage);
        unlink('konten/'. $this->request->getVar('imageLama'));
      }
       $data = [
         'penulis' => $this->request->getVar('penulis'),
         'tgl' => $this->request->getVar('tgl'),
         'judul' => $this->request->getVar('judul'),
         'deskripsi' => $this->request->getVar('deskripsi'),
         'image' => $namaImage
       ];
      unset($data['_method']);
      $this->db->table('content')->where(['id' => $id]) -> update($data);
      return redirect()->to(site_url('content'))->with('success', 'Content Data Updated Successfully');
    }
public function destroy($id)
{
  //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
  $content = new ContentModel();
  $data = $content->find($id);
  $fileImage = $data->image;
  if (file_exists('konten/'.$fileImage)) {
      unlink('konten/'.$fileImage);
  }
  $content->delete($id);
  return redirect()->to(site_url('content'))->with('success', 'Content Data Deleted Successfully');
}
  }
