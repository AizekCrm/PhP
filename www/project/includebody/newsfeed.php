<?php
include $_SERVER['DOCUMENT_ROOT'].'/includebody/services/pagination.php';
use paginationPage\pagination;
$pageData = new pagination();
$dataDb = $pageData->pagPage(5);
$countNews = $pageData->countNews();

?>

<?php for($i=0; $i < count($dataDb); $i++) : ?>
<div style="margin-top: 2%" class="card mb-4 shadow-sm news-block">
    <div style="padding: 1%" class="btn btn-info">
        <a href="index.php?page=detailsnews&id=<?php echo $dataDb[$i]['id']?>"><h1 class="a"><?php echo $dataDb[$i]['data_news'] ?>-<?php echo $dataDb[$i]['headers']?></h1></a>
    </div>
    <div class="card-body">
        <div class="anons">
            <h4><?php echo $dataDb[$i]['Announcement']?></h4>
        </div>
    </div>
    <div>
        <?php if($_SESSION['is_admin'] == true): ?>
            <div style="margin: 1%">
                <a href="index.php?page=refactornews&id=<?php echo $dataDb[$i]['id']?>"><h1 class="a btn btn-primary">Редактировать новость</h1></a>
            </div>
        <?php endif ?>
        <?php if($_SESSION['is_admin'] == true): ?>
            <div style="margin: 1%">
                <form action="includebody/services/service_deleteNEWS.php" method="post">
                    <input type="hidden" name="idnews" value="<?php echo $dataDb[$i]['id']?>">
                    <input class="btn btn-warning" type="submit" name="delete" value="Удалить новость">
                </form>
            </div>
        <?php endif ?>
    </div>
</div>
<?php endfor;?>

<div class="page">
<?php for ($i = 1; $i <= $countNews; $i++):?>
    <div class="page_marg">
        <a class="btn btn-info" href="index.php?page=newsfeed&pageNumber=<?php echo $i?>"><?php echo $i?></a>
    </div>
<?php endfor;?>
</div>
