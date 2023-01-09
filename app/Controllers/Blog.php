<?php

namespace App\Controllers;
use App\Models\ContentModel;
class Blog extends BaseController
{
  protected $contentModel;
  public function __construct()
  {
      $this->contentModel = new ContentModel();
  }
    public function index()
    {
        return view('blog/blog-detail');
    }
    public function detail($id = 0)
    {
      $builder = $this->db->table('content');
      $builder->select('id, judul, penulis, tgl, deskripsi, image');
      $builder->where('id', $id);
      $query   = $builder->get();
      $data['content'] = $query->getRow();
      if (empty($data['content'])) {
        return redirect()->to('');
      }
        return view('blog/blog-detail', $data);
    }
}
