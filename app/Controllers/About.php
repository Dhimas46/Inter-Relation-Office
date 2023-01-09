<?php

namespace App\Controllers;
use App\Models\AboutModel;
class About extends BaseController
{
    protected $aboutModel;
    public function __construct()
    {
        $this->about = new AboutModel();
    }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->about->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
        return view('about/get', $data);
    }


}
