<?php
/*
Author: Osman Çakmak
Skype: oxcakmak
Email: oxcakmak@hotmail.com
Website: http://oxcakmak.com/
Country: Turkey [TR]
*/

$page = @intval($_GET['page']); if(!$page){ $page = 1; }
$totalDataCount = $dbh->query("SELECT * FROM user WHERE user_role != 11 ORDER BY user_id ASC")->rowCount();
$pageLimit = 5;
$pageNumber = ceil($totalDataCount/$pageLimit); if($page > $pageNumber){ $page = 1;}
$viewData = $page * $pageLimit - $pageLimit;
$viewPerPage = 30;


foreach($dbh->query("SELECT * FROM user WHERE user_role != 11 ORDER BY user_id ASC LIMIT $viewData, $pageLimit") as $adminUserRow){

}

if($page > 1){ 
    echo '
    <a class="btn btn-white" href="'.$config['base_url'].'user?page=1"><i class="fa fa-angle-left"></i></a>
    <a class="btn btn-white" href="'.$config['base_url'].'user?page='.($page - 1).'"><i class="fa fa-angle-double-left"></i></a>
    ';
}
for($i = $page - $viewPerPage; $i < $page + $viewPerPage +1; $i++){ 
    if($i > 0 && $i <= $pageNumber){
        if($i == $page){
            echo '<a class="btn btn-white lazur-bg" href="'.$config['base_url'].'user?page='.$i.'">'.$i.'</a>';
        }else{
            echo '<a class="btn btn-white" href="'.$config['base_url'].'user?page='.$i.'">'.$i.'</a>';
        }
    }
}
if($page != $pageNumber){
    echo '
    <a class="btn btn-white" href="'.$config['base_url'].'user?page='.($page + 1).'"><i class="fa fa-angle-right"></i></a>
    <a class="btn btn-white" href="'.$config['base_url'].'user?page='.$pageNumber.'"><i class="fa fa-angle-double-right"></i></a>
    ';
}
?>
