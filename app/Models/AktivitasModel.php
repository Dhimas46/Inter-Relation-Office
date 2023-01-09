<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
  protected $table                = 'aktivitas';
	protected $primaryKey           = 'id';
	protected $returnType           = 'object';
  protected $allowedFields        = ['judul', 'image'];

  function getAll(){
    $builder = $this->db->table('aktivitas');
    //$builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
    $query   = $builder->get();
    return $query->getResult();
  }
  function getPaginated($num, $keyword = null){
    $builder = $this->builder();
    $builder->select('id','judul', 'image');
    $query   = $builder->get();
    if ($keyword != '') {
      $builder->like('judul', $keyword);
    }
  return [
      'aktivitas' => $this->paginate($num),
      'pager' =>$this->pager,
  ];
  }
}
