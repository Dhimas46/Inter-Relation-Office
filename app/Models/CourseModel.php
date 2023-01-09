<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
	protected $table                = 'course';
	protected $primaryKey           = 'id_course';
	protected $returnType           = 'object';
	protected $allowedFields        = ['judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download'];


	function getAll(){
		$builder = $this->db->table('course');
		// $builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
		$query   = $builder->get();
		return $query->getResult();
	}
	function getPaginated($num, $keyword = null){
		$builder = $this->builder();
		$builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
		$query   = $builder->get();
		if ($keyword != '') {
			$builder->like('judul', $keyword);
		}
	return [
			'course' => $this->paginate($num),
			'pager' =>$this->pager,
	];
	}
}
