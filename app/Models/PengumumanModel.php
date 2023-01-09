<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
  protected $table                = 'pengumuman';
  protected $primaryKey           = 'id';
  protected $returnType           = 'object';
  protected $allowedFields        = ['judul', 'penulis','tgl', 'deskripsi', 'prodi', 'image'];

  function getAll(){
    $builder = $this->db->table('pengumuman');
    // $builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
    $query   = $builder->get();
    return $query->getResult();
  }
  function getPaginated($num, $keyword = null){
    $builder = $this->builder();
    $builder->select('id','judul', 'penulis','tgl', 'deskripsi', 'image', 'prodi');
    $query   = $builder->get();
    if ($keyword != '') {
      $builder->like('judul', $keyword);
      $builder->orLike('tgl', $keyword);
      $builder->orLike('penulis', $keyword);
    }
  return [
      'pengumuman' => $this->paginate($num),
      'pager' =>$this->pager,
  ];
  }
}
