<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';
use DB\dbQuery;

$Db = new dbQuery();
$dataDb = $Db->getOne('news', $_GET['id']);
?>
<div class="card mb-4 shadow-sm news-block">
    <form action="includebody/services/service_refactorNEWS.php" method="post">
        <div class="card-header">
            <h1><?php echo date('d.m.y') ?>-<input type="text" name="Heading" value="<?php echo $dataDb['headers']?>"></h1>
        </div>
        <div class="padding" style="margin-top: 1%">
            <h2>Анонс</h2>
            <textarea name="Announcement" class="autoExpand forumPost form-control" rows="4" data-min-rows="4" ><?php echo $dataDb['Announcement']?></textarea><br>
        </div>
        <div style="margin-left: 2%" class="card-body">
            <h4>Новостное фото</h4>
            <input type="file" name="Image">
        </div>
        <div class="padding">
            <div class="forumDivOuter" style="">
                <div id="forumDiv">
                    <textarea name="Description" class="autoExpand forumPost form-control" rows="4" data-min-rows="4"><?php echo $dataDb['description']?></textarea><br>
                    <div style="margin: 1%">
                        <input type="hidden" name="idnews" value="<?php echo $dataDb['id']?>">
                        <input type="submit" name="refactor" style="width: 200px" class="btn btn-primary" value="Продолжить">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>