<?php
namespace deleteNews;
include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';
use DB\dbQuery;

class service_deleteNEWS{
    public function delete(){
        if($_POST['delete']){
            try {
                $db = new dbQuery();
                $db->deleteData('news', $_POST['idnews']);
            } catch (\PDOException $ex) {
                file_put_contents('text.log',var_export($ex,1));
            }
            $db = null;
            header("Location: http://localhost/index.php?page=newsfeed");
        }
    }
}
$delete = new service_deleteNEWS();
$delete->delete();