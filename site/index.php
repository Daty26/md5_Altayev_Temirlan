<?php
  session_start();
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SimpleNotes</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="css/styles.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"  referrerpolicy="no-referrer"/>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3">
      <div class="container">
        <a class="navbar-brand" class="logo" href="#">SpaceNotes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 ms-3 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#homePage">Главная</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features">О нас</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Контакты</a>
            </li>
          </ul>
          <ul class="navbar-nav" style="margin-left: 1rem !important;">
          
            <?php
              if(isset($_SESSION["usersname"])){
                echo "<a href='php/inc/logout.inc.php' class='log-on'><button class='btn btn-primary log-on'>Выйти</button></a>";
              }else{
                echo "<a href='php/log-in.php' class='log-on'><button class='btn btn-primary log-on'>Войти в аккаунт</button></a>";
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Home page -->
    <section id="homePage" class="vh-100 align-items-center d-flex">
      <div class="container">
        <div class="col-lg-7 mx-auto text-center text-white">
          <div class="row">
            <h1 class="display-4">Сохраняй свои заметки на надежном, бесплатном сайте</h1>
            <p class="my-4"> Здесь вы можете создавать задачи, писать различные записи, вставлять различные картинки.</p>
            <?php
              if(isset($_SESSION["usersname"])){
                echo "<a id='get-started' class='btn btn-primary' href='main.php' target='_blank'>Начать запись</a>";
              }else{
                echo "<p class='my-4' style='color:red;'>Чтобы начать запись, войдите в аккаунт</p>";
              }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Home page -->


    <!-- Features -->
      <section id="features" class="row w-100" style="margin-top: 100px;">
        <div id="features-container">
          <div class="col-lg-6 col-img"></div>
        <div class="col-lg-6">
          <div class="container">
            <div class="row">
              <div class="col-md-10" id="features-txt">
                <h6 class="text-primary">О нас</h6>
                <h1>Почему мы?</h1>
                <p>Мы небольшая компания, которая предоставляет доступ к бесплатному хранению заметок на нашем сайте.</p>
                <div class="mt-5">
                  <div class="iconbox me-3">
                    <i class='bx bx-check-shield' ></i>
                  </div>
                  <div>
                    <h5>Безопасность</h5>
                  <p>Все ваши записи хранятся под полной защитой</p>
                </div>
                <div class="mt-5">
                  <div class="iconbox me-3">
                    <i class='bx bx-edit-alt' ></i>
                  </div>
                  <div>
                    <h5>Простота</h5>
                  <p>Создавайте заметки без усилий</p>
                </div>
                <div class="mt-5">
                  <div class="iconbox me-3">
                    <i class='bx bx-devices' ></i>
                  </div>
                  <div>
                    <h5>Мобильность</h5>
                  <p>Ваши заметки всегда под рукой. Наш сайт полностью оптимизирован для мобильных устройств</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
    <!-- Features -->

    <!-- Footer & contacts -->
    <section id="footer" class="row w-100" style="margin-top: 100px;">
      <div id="footer-top">
        <div class="container">
          <div class="row">
            <div class="mx-auto" style="text-align: center;">
              <a class="logo" style="color:#fff; text-decoration: none !important; font-size: 30px;" href="#">SpaceNotes</a>
            </div>
            <div id="social" class="col-md-4 mx-auto" style="text-align: center;">
              <a href="#"><i class="fab fa-snapchat"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-facebook-f"></i></a>
            </div>
            <ul id="footer-list">
              <li>
                <a href="#">Главная</a>
              </li>
              <li>
                <a href="#">О нас</a>
              </li>
              <li>
                <a href="#">Контакты</a>
              </li>
            </ul>
            <div style="flex-shrink: 1;">
              <p id="footer-contacts" style="text-align: center;">SpaceNotesHelper@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Footer & contacts -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"></script>
      <script src="js/script.js"></script>
  </body>
</html>
