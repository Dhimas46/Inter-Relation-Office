<?php
namespace App\Controllers;

use App\Models\CourseModel;

class Course extends BaseController
{
  protected $courseModel;
  public function __construct()
  {
      $this->courseModel = new CourseModel();
  }
  public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->courseModel->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      return view('course/get', $data);
    }
public function create()
  {
    return view('course/add');
  }
  public function save(){
    {
		if (!$this->validate([
			'deskripsi' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Tidak boleh kosong'
				]
			],
			'dokumen' => [
				'rules' => 'uploaded[dokumen]|mime_in[dokumen,application/pdf]',
				'errors' => [
					'uploaded' => 'Harus Ada File yang diupload',
					'mime_in' => 'File Extention Harus Berupa jpg,jpeg,pdf,png'
				]
			]
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->to(site_url('course/add'))->with('error', 'The Document Must Be a pdf');
		}
		$fileDokumen = $this->request->getFile('dokumen');
		$namaDokumen = $fileDokumen->getRandomName();
    $fileDokumen->move('dokumen/', $namaDokumen);

		$this->courseModel->save([
			'judul' => $this->request->getVar('judul'),
      'dokumen' => $namaDokumen,
      'deskripsi' => $this->request->getVar('deskripsi'),
      'pemilik' => $this->request->getVar('pemilik'),
      'tgl' => $this->request->getVar('tgl'),
      'jumlah_download' => $this->request->getVar('jumlah_download'),
		]);
		// $datadokumen->move('dokumen/', $fileName);
		session()->setFlashdata('success', 'Course Data Saved Successfully');
		return redirect()->to(base_url('course'));
	}

}
public function details($id = 0)
{
  $builder = $this->db->table('course');
  $builder->select('id_course, judul, dokumen, deskripsi, pemilik, tgl');
  $builder->where('id_course', $id);
  $query   = $builder->get();
  $data['course'] = $query->getRow();
  if (empty($data['course'])) {
    return redirect()->to('/dashboard');
  }
    return view('course/details', $data);
}

public function edit($id = null)
  {
      if ($id != null) {
        $query = $this->db->table('course')->getWhere(['id_course' => $id]);
        if ($query->resultID->num_rows > 0) {
          $data['course'] = $query->getRow();
          return view ('course/edit', $data);
        } else{
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
  }
public function update($id)
{

  $fileDokumen  = $this->request->getFile('dokumen');
  if ($fileDokumen->getError() == 4) {
    $namaDokumen = $this->request->getVar('dokumenLama');
  } else{
    $namaDokumen = $fileDokumen->getRandomName();
    $fileDokumen->move('dokumen/', $namaDokumen);
    unlink('dokumen/'. $this->request->getVar('dokumenLama'));
  }
   $data = [
     'judul' => $this->request->getVar('judul'),
     'deskripsi' => $this->request->getVar('deskripsi'),
     'tgl' => $this->request->getVar('tgl'),
     'pemilik' => $this->request->getVar('pemilik'),
     'dokumen' => $namaDokumen
   ];
  unset($data['_method']);
  $this->db->table('course')->where(['id_course' => $id]) -> update($data);
  return redirect()->to(site_url('course'))->with('success', 'Course Data Updated Successfully');
}
public function destroy($id)
    {
      //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
      $course = new CourseModel();
      $data = $course->find($id);
      $fileDokumen = $data->dokumen;
      if (file_exists('dokumen/'.$fileDokumen)) {
          unlink('dokumen/'.$fileDokumen);
      }
      $course->delete($id);
      return redirect()->to(site_url('course'))->with('success', 'Course Data Deleted Successfully');
    }
  }
