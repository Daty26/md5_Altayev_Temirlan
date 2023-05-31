<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Регистрация пользователя</title>
        <link rel="stylesheet" href="../css/forms.css"/>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>Войти</header>
                    <h2>Войдите на свой аккаунт</h2>
                    <form action="inc/login.inc.php" method="post">
                        <div class="field input-field input-field-login">
                            <input type="text" name="name" placeholder="Логин/email" class="username">
                        </div>
                        <div class="field input-field input-field-login">
                            <input type="password" name="pass" placeholder="Пароль" class="password">
                            <i class='bx bx-hide'></i>
                        </div>
                        <div class="field button-field" id="button-field-login">
                            <button name="submit">Войти</button>
                        </div>
                        <div class="form-link">
                            <span>Еще нету аккаунта? <a href="sign-up.php" class="signup-link link">Создать аккаунт</a></span>
                        </div>
                        <div class="allert">
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyinput"){
                                        echo "<p class='red'>Заполните поля</p>";
                                    }
                                    else if($_GET["error"] == "incoorectlogin"){
                                        echo "<p class='red'>Вы ввели неверный логин</p>";
                                    }
                                    else if($_GET["error"] == "wrongpass"){
                                        echo "<p class='red'>Вы ввели неверный пароль</p>";
                                    }
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <script src="../js/forms.js"></script>
        </section>
    </body>
</html>