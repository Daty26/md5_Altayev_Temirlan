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
            <div class="form signup">
                <div class="form-content">
                    <header>Зарегестрироваться</header>
                    <h2>Создайте свою первую заметку вместе с нами!</h2>
                    <form action="inc/signup.inc.php" method="post">
                        <div class="field input-field">
                            <input type="text" name="name" placeholder="Логин" class="username">
                        </div>
                        <div class="field input-field">
                            <input type="email" name="email" placeholder="E-mail" class="email">
                        </div>
                        <div class="field input-field">
                            <input type="password" name="pass" placeholder="Пароль" class="password">
                            <i class='bx bx-hide'></i>
                        </div>
                        <div class="field input-field">
                            <input type="password" name="passrepeat" placeholder="Пароль" class="password">
                            <i class='bx bx-hide'></i>
                        </div>
                        <div class="field button-field">
                            <button name="submit">Зарегестрироваться</button>
                        </div>
                        <div class="form-link">
                            <span>Уже есть аккаунт? <a href="log-in.php" class="login-link link">Войти в аккаунт</a></span>
                        </div>
                        <div class="allert">
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "emptyinput"){
                                        echo "<p class='red'>Заполните поля!</p>";
                                    }
                                    else if($_GET["error"] == "invalidname"){
                                        echo "<p class='red'>Введите подходящий логин!</p>";
                                    }
                                    else if($_GET["error"] == "emailistyppenwrong"){
                                        echo "<p class='red'>Введите подходящий email!</p>";
                                    }
                                    else if($_GET["error"] == "passwordsarenotthesame"){
                                        echo "<p class='red'>Пароли не соотвествуют друг к другу!</p>";
                                    }
                                    else if($_GET["error"] == "namealreadyexists"){
                                        echo "<p class='red'>Такой логин уже существует!</p>";
                                    }
                                    else if($_GET["error"] == "stmtfailed"){
                                        echo "<p class='red'>Произошла техническая ошибка!</p>";
                                    }
                                    else if($_GET["error"] == "none"){
                                        echo "<p class='green'>Вы успешно авторизовались!</p>";
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