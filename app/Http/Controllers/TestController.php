<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Core\Database;
use Core\Response;

class TestController extends Controller
{
  protected $post;

  public function __construct()
  {
    $this->post = new Post();
  }




  public function index()
  {

    return Response::view('test/index', 'test-layout');
  }
}
