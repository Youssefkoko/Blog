<?php
class Pages extends Controller
{
  public function __construct()
  {
  }

  public function index()
  {
    if (isLoggedIn()) {
      redirect('posts');
    }
    $data =  [
      'title' => 'Welkon in Blog site',
      'desc' => 'Simple Blog built on MVC PHP frameWork.',
    ];
    $this->view('pages/index', $data);
  }

  public function about()
  {
    $data = [
      'title' => 'About Us',
      'desc'  => 'A blog about coders',
    ];
    $this->view('pages/about', $data);
  }
}
