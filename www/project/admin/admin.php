<?php include "authorizeadmin.php";?>
<div class="card mb-4 shadow-sm news-block">
    <form action="authorizeadmin.php" method="post">
        <div class="card-header">
            <p>Логин АДМИНКИ :</p>
            <input type="text" name="Login">
        </div>
        <div class="card-header">
            <p>Пароль АДМИНКИ :</p>
            <input type="text" name="Password">
        </div>
        <input style="margin-top: 1%" type="submit" name="sub" value="Войти">
    </form>
</div>

