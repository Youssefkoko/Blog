<nav class="navbar navbar-expand-lg navbar-dark bg-dark my-2">
  <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample05">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT . '/pages/about'; ?>">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" tabindex="-1">blog</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>

      </li>
    </ul>
    <div class="col-4  justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT . '/users/register'; ?> ">Sign up</a>
      <a class="btn btn-sm btn-outline-secondary" href="<?php echo URLROOT . '/users/login'; ?>">Login</a>
    </div>

  </div>
</nav>