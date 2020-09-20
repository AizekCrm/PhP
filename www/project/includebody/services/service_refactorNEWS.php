<?php
namespace refactorNews;

include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';

use DB\dbQuery;

class service_refactorNEWS{
    public function refactor(){
        if($_POST['refactor']){
            try {
                $db = new dbQuery();
                $db->updateData('news', [
                    'headers' => $_POST['Heading'],
                    'Announcement'=>$_POST['Announcement'],
                    'img'=>$_POST['Image'],
                    'description'=>$_POST['Description'],
                    'data_news'=>date('d.m.y')
                ], $_POST['idnews']);
            } catch (\PDOException $ex) {
                file_put_contents('text.log',var_export($ex,1));
            }
            $db = null;
            header("Location: http://localhost/index.php?page=newsfeed");
        }
    }
}
$refactor = new service_refactorNEWS();
$refactor->refactor();
