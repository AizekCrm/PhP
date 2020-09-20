<?php
namespace paginationPage;

include $_SERVER['DOCUMENT_ROOT'].'/config/dbQuery.php';

use DB\dbQuery;

class pagination{
    private $dbquery;

    public function __construct(){
        $this->dbquery = new dbQuery();
    }

    public function pagPage($limit){

        if (isset($_GET['pageNumber'])) {
            $page = $_GET['pageNumber'];

        } else {
            $page = 1;
        }
        $offset = ($page - 1)  * $limit;

        return $result =  $this->dbquery->getOrderData('news','data_news',$offset,$limit);
    }

    public function countNews(){
        $arrayNews = $this->dbquery->getAllData('news');
        return $countNews = count(array_chunk($arrayNews,5));
    }
}