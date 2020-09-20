
<div class="card mb-4 shadow-sm news-block">
    <form action="includebody/services/service_addNEWS.php" method="post">
        <div class="card-header">
            <h1><?php echo date("d.m.y") ?> - <input type="text" name="Heading" placeholder="Укажите заголовок"></h1>
        </div>
        <div class="padding" style="margin-top: 1%">
            <h2>Анонс</h2>
            <textarea name="Announcement" class="autoExpand forumPost form-control" rows="4" data-min-rows="4" placeholder="Анонс"></textarea><br>
        </div>
        <div style="margin-left: 2%" class="card-body">
            <h4>Новостное фото</h4>
            <input type="file" name="Image">
        </div>
        <div class="padding">
            <div class="forumDivOuter" style="">
                <div id="forumDiv">
                    <h2>Опишите новость</h2>
                    <textarea name="Description" class="autoExpand forumPost form-control" rows="4" data-min-rows="4" placeholder="Описание новости"></textarea><br>
                    <div style="margin: 1%">
                        <input type="submit" name="Add" style="width: 200px" class="btn btn-primary" value="Добавить новость">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
