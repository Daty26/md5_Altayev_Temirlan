<?php 
    require "save-notes.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cоздай заметку</title>
        <!-- jquery -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
        <!-- icons -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <!-- quill -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/monokai-sublime.min.css" integrity="sha512-ade8vHOXH67Cm9z/U2vBpckPD1Enhdxl3N05ChXyFx5xikfqggrK4RrEele+VWY/iaZyfk7Bhk6CyZvlh7+5JQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"  referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="../css/main_styles.css"/>
        <link rel="stylesheet" href="../css/redactor.css">

    </head>

    <body>
        <div id="main" style="justify-content: center;">
            <div id="right-side">
                <div class="container" style="height: 100%;">
                    <div class="row height align-items-center" id="content-container">
                        <div id="heading" style="display: flex; justify-content: center;">
                            <a href="../main.php" style="text-decoration: none;"><h2 style="font-size: calc(26px + 0.390625vw) !important; cursor: pointer;">SpaceNotes</h2></a>
                        </div>
                        <div class="note-container" style="justify-content: center; max-width: 100%;">
                            <div class="note-wrapper">
                                <div class="note-tool">
                                    <div class="back">
                                        <i class='bx bx-left-arrow-alt' href="../main.php"></i>
                                    </div>
                                    <div class="remove">
                                        <?php
                                            if (isset($_GET['noteid'])) {
                                        ?>
                                        <a href="remove-note.php?noteid=<?php echo $_GET['noteid'];?>">
                                            <i class='bx bxs-trash'></i>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="note-title">
                                    <label for="title">Заголовок</label>
                                    <div class="input-wrap" id="divTitle" contenteditable="true" >
                                        <?php
                                            if (!empty($row)) {
                                                echo $row['title'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="note-cont">
                                    <label for="body">Содежание</label>
                                    <div id="count">
                                        Количество символов: <span id="symbolCount"></span>,  Количество букв: <span id="wordCount"></span>
                                    </div>
                                    <div id="text-editor" >
                                        <?php
                                            if (!empty($row)) {
                                                echo $row['content'];
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="note-save">
                                    <form action="" method="POST">
                                        <input type="hidden" name="title" class="note-txt-title" id="inputTitle">
                                        <input type="hidden" name="content" class="note-txt-content" id="inputContent">
                                        <input type="hidden" name="color" class="note-txt-color" id="inputColor">
                                        <p class="hidden" id="color-hidden"><?php echo trim(urldecode($_GET['color']));?></p>
                                        <div class="allert">
                                            <?php
                                                if(isset($_GET["error"])){
                                                    if($_GET["error"] == "emptyinput"){
                                                        echo "<p class='red'>Заполните поля!</p>";
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <button type="submit" name="submit" class="save-btn primary-btn">
                                            Сохранить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            
        ?>
        <script src="../js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js" integrity="sha512-rdhY3cbXURo13l/WU9VlaRyaIYeJ/KBakckXIvJNAQde8DgpOmE+eZf7ha4vdqVjTtwQt69bD2wH2LXob/LB7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module"></script>
        <script src="../js/textEditor.js"></script>
    </body>
</html>