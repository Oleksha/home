<!doctype html >
<html lang="ru" class="h-100">
<head>
  <base href="/">
  <link rel="shorcut icon" href="img/star.png" type="image/png" />
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta charset="UTF-8">
  <link href="assets/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/fonts.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <?=$this->getMeta();?>
</head>
<body class="d-flex flex-column h-100">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="grid" fill="#ffffff" viewBox="0 0 16 16">
      <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"></path>
    </symbol>
  </svg>
  <header class="p-3 bg-dark text-white">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
      <div class="container">
        <a class="navbar-brand" href="#">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Grid"><use xlink:href="#grid"></use></svg>
          Домашний помощник
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Оплаты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Данные</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Разное</a>
            </li>
          </ul>
          <div class="nav-item dropdown ms-5" role="group">
            <a href="#" class="nav-link dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/avatar.png" alt="" class="rounded-circle" width="32" height="32">
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Профиль</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="user/logout">Выход</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <?=$content;?>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">&copy; 2023 Дерябин Олег </span>
    </div>
  </footer>

  <div class="preloader"><img src="img/ring.svg" alt=""></div>

  <script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
  <script>
      let path = '<?=PATH;?>';
  </script>
  <script type="text/javascript" src="assets/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
  <?php
    foreach ($scripts as $script) {
      echo $script;
    }
  ?>
  <script type="text/javascript" src="js/main.js?<?echo time();?>"></script>
</body>
</html>
