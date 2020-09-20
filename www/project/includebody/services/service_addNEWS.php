<?php
namespace addNews;

include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';

use DB\dbQuery;

class service_addNEWS{
    public function add(){
        if($_POST['Add']){
            try {
                $db = new dbQuery();
                $db->insertData('news',[
                    'headers' => $_POST['Heading'],
                    'Announcement'=>$_POST['Announcement'],
                    'img'=>$_POST['Image'],
                    'description'=>$_POST['Description'],
                    'data_news'=>date('d.m.y')
                ]);
            } catch (\PDOException $ex) {
                file_put_contents('text.log',var_export($ex,1));
            }
            $db = null;
            header("Location: http://localhost/index.php?page=newsfeed");
        }
    }
}
$add = new service_addNEWS();
$add->add();

