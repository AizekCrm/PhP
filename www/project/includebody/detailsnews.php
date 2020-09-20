<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';
use DB\dbQuery;

$Db = new dbQuery();
$dataDb = $Db->getOne('news', $_GET['id']);
$img = '/img/'.$dataDb['img'];
?>
<div class="card mb-4 shadow-sm news-block" style="margin-top: 1%">
    <div class="card-body">
        <div class="details-news">
            <ul class="list-unstyled mt-3 mb-4">
                <a class="btn btn-info" href="index.php?page=newsfeed">Вернуться на главную</a>
                <h1 style="padding: 1%"><?php echo $dataDb['data_news']?> - <?php echo $dataDb['headers']?></h1>
                <div style="padding: 1%"><h3><?php echo $dataDb['Announcement']?></h3></div>
                <div style="padding: 1%"><img src="<?php echo $img?>" width="300" height="300" alt="фото новостей"></div>
                <div style="padding: 1%"><?php echo $dataDb['description']?></div>
            </ul>
        </div>
    </div>
</div>


