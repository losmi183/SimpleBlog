<?php require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><img height="80px" src="/images/nba-logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="/index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/views/admin/post/all.view.php">Admin</a></li>
    </ul>

    
    <ul class="navbar-nav ml-auto">
      <?php if(!LoggedIn()) : ?>
        <li class="nav-item"><a class="nav-link" href="/views/auth/register.view.php">Sign up</a></li>
        <li class="nav-item"><a class="nav-link" href="/views/auth/login.view.php">Sign in</a></li>
      <?php else : ?>
        <li class="nav-item"><a class="nav-link" href="/app/controllers/LogoutController.php">Sign out</a></li>
      <?php endif; ?>
    </ul>

  </div>
</nav>