<?php

class Posts extends Controller
{
  public function __construct()

  {
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');

    if (!isLoggedIn()) {
      redirect('users/login');
    }
  }
  public function index()
  {
    $post = $this->postModel->getPosts();
    $data = [
      'post' => $post,
    ];
    $this->view('posts/index', $data);
  }
  // Add function 
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body text';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validated
        if ($this->postModel->addPost($data)) {
          flash('post_message', 'Post Added');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => ''
      ];

      $this->view('posts/add', $data);
    }
  }

  // public function add()
  // {
  //   if ($_SESSION['REQUEST_METHOD'] = 'POST') {
  //     // Sanitize the Post 
  //     $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  //     $data = [
  //       'title' => trim($_POST['title']),
  //       'body' => trim($_POST['body']),
  //       'user_id' => $_SESSION['user_id'],
  //       'title_err' => '',
  //       'body_err' => '',
  //     ];
  //     // Validate title 
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'please Enter your title';
  //     };
  //     if (empty($data['body'])) {
  //       $data['body_err'] = 'please Enter your body Text';
  //     };
  //     // Make sure no errors 
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       if ($this->postModel->addPost($data)) {
  //         flash('post_message', 'Post Added');
  //         redirect('posts');
  //       } else {
  //         die('something went wrong');
  //       }
  //     } else {
  //       $this->view('posts/add', $data);
  //     }
  //   } else {
  //     $data = [
  //       'title' => '',
  //       'body' => '',
  //     ];
  //   }
  //   $this->view('posts/add', $data);
  // }

  // Edit function 

  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST array
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => $id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate data
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter title';
      }
      if (empty($data['body'])) {
        $data['body_err'] = 'Please enter body text';
      }

      // Make sure no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validated
        if ($this->postModel->updatePost($data)) {
          flash('post_message', 'Post Updated');
          redirect('posts');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/edit', $data);
      }
    } else {
      // Get existing post from model
      $post = $this->postModel->getPostById($id);

      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body
      ];

      $this->view('posts/edit', $data);
    }
  }
  // public function edit($id)
  // {
  //   if ($_SESSION['REQUEST_METHOD'] = 'POST') {
  //     // Sanitize the Post 
  //     $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  //     $data = [
  //       'title' => trim($_POST['title']),
  //       'body' => trim($_POST['body']),
  //       'user_id' => $_SESSION['user_id'],
  //       'title_err' => '',
  //       'body_err' => '',
  //     ];
  //     // Validate title 
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'please Enter your title';
  //     };
  //     if (empty($data['body'])) {
  //       $data['body_err'] = 'please Enter your body Text';
  //     };
  //     // Make sure no errors 
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       if ($this->postModel->updatePost($data)) {
  //         flash('post_message', 'Post Updated');
  //         redirect('posts');
  //       } else {
  //         die('something went wrong');
  //       }
  //     } else {
  //       $this->view('posts/edit', $data);
  //     }
  //   } else {
  //     // Get exisiting post from the model 
  //     $post = $this->postModel->getPostById($id);
  //     print_r($post);
  //     // Check for the owner 
  //     if ($post->user_id != $_SESSION['user_id']) {
  //       redirect('post');
  //     }
  //     $data = [
  //       'id' => $id,
  //       'title' => $post->title,
  //       'body' => $post->body,
  //     ];
  //   }
  //   $this->view('posts/edit', $data);
  // }


  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];
    $this->view('posts/show', $data);
  }

  public function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
      if ($this->postModel->deletePost($id)) {
        flash('post_message', 'Post Removed');
        redirect('posts');
      }
    } else {
      die('Something Went wrong');
      redirect('posts');
    }
  }
}
