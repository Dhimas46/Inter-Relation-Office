<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
  protected $table                = 'content';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
  protected $allowedFields        = ['judul', 'penulis','tgl', 'deskripsi', 'image'];

  function getAll(){
    $builder = $this->db->table('content');
    //$builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
    $query   = $builder->get();
    return $query->getResult();
  }
  function getPaginated($num, $keyword = null){
    $builder = $this->builder();
    $builder->select('id','judul', 'penulis','tgl', 'deskripsi', 'image');
    $query   = $builder->get();
    if ($keyword != '') {
      $builder->like('judul', $keyword);
    }
  return [
      'content' => $this->paginate($num),
      'pager' =>$this->pager,
  ];
  }
}
