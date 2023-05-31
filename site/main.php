<?php
session_start();

// Получение значений из сессии
$user_id = $_SESSION["usersid"];
if(!$user_id){
    header("location: php/log-in.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cоздай заметку</title>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>

        <link rel="stylesheet" href="css/main_styles.css"/>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"  referrerpolicy="no-referrer"/>
    </head>

    <body>
        <div id="main">
            <div id="left-side">
                <div class="navbar-logo">
                    <a class="logo" href="index.php">SpaceNotes</a>
                </div>
                <div id="add-note">
                    <i id="plus-icon"> <img src="img/plus.svg" width="55px" height="55px"></i>
                </div>
                <ul class="mx-auto text-center" id="list-notes">
                    <li>
                        <div class="color-note" style="background-color: #FFC971;" data-hidden-info="#FFC971" onclick="addNote(this)"></div>
                    </li>
                    <li>
                        <div class="color-note" style="background-color: #FF9A76;" data-hidden-info="#FF9A76"  onclick="addNote(this)"></div>
                    </li>
                    <li>
                        <div class="color-note" style="background-color: #B894FD;" data-hidden-info="#B894FD"  onclick="addNote(this)"></div>
                    </li>
                    <li>
                        <div class="color-note" style="background-color: #10E6FF;" data-hidden-info="#10E6FF"  onclick="addNote(this)"></div>
                    </li>
                    <li>
                        <div class="color-note" style="background-color: #E4F691;" data-hidden-info="#E4F691"  onclick="addNote(this)"></div>
                    </li>

                </ul>
            </div>
            <div id="right-side">
                <div class="container" style="height: 100%;">
                    <div class="row height align-items-center" id="content-container">
                        <div class="form">
                            <i class="fa fa-search" id="searchIcon"></i>
                            <input type="text" class="form-control form-input" id="searchButt" placeholder="Поиск">
                        </div>
                        <div id="heading">
                            <h2>
                                Заметки
                            </h2>
                        </div>
                        <div class="note-container">
                            <?php
                                require "php/inc/db.inc.php";
                                $sql = "SELECT *, DATE_FORMAT(updated_at, '%M %d, %Y') AS formatted_updated_at FROM notes WHERE user_id = '$user_id' ORDER BY updated_at DESC";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '
                                            <div class="notes" style="background-color:'.$row['color'].';">
                                                <div class="notes-txt">
                                                    <p>';
                                                    if(empty($row["title"])){
                                                        echo $row["content"];
                                                    }else{
                                                        echo $row["title"];
                                                    }
                                                    echo'</p>
                                                </div>
                                                <div class="add-info-cont">
                                                    <div class="note-date">
                                                        '.$row['formatted_updated_at'].'
                                                    </div>
                                                    <a href="php/text-editor.php?noteid='.$row['id'].'&color='. urlencode($row['color']).'">
                                                        <div class="remake-note">
                                                            <i class="bx bxs-pencil"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>