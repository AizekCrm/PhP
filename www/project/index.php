<?php session_start()?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset=utf-8">
        <meta name="view-port" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Новости</title>
        <link type="text/css" href="css\style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body class="body">
        <header class="header text-align">
            <nav>
                <h1>Новостная лента</h1>
                <?php if( $_GET['page'] == 'adminpage') :?>
                <?php else:?>
                    <?php if($_SESSION['is_admin'] == true): ?>
                        <div><a class="btn btn-primary" href="index.php?page=adminpage">Добавить новость</a></div>
                    <?php endif ?>
                <?php endif; ?>
            </nav>
        </header>

        <?php
        $page = (isset($_GET['page']) ? $_GET['page'] : 'newsfeed');
        include 'includebody/'.basename($page).'.php';
        ?>

        <footer class="footer text-align">
            <h1>Новостная лента</h1>
        </footer>
    </body>
</html>
