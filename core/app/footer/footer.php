<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/app/footer/css/footer.css" media="screen" />

<?php
include_once $PATH_APP_CORE.'footer/lib/FooterList.php';
$footer = new FooterList();
?>

<div id="footer_container">
    <div id="footer_col1">
        <font size="4"><strong>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="CMS_TITLE" && $foot['language']=="en"){
                            echo $foot['title'];
                        }else{
                            echo "";
                        }
                    }
                ?>
        </strong></font><br>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="CMS" && $foot['language']=="en"){
                            echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                        }else{
                            echo "";
                        }
                    }
                ?>
    </div>
    <div id="footer_col2">
        <font size="4"><strong>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="SUPPORT_TITLE" && $foot['language']=="en"){
                            echo $foot['title'];
                        }else{
                            echo "";
                        }
                    }
                ?>
        </strong></font><br>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="SUPPORT" && $foot['language']=="en"){
                            echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                        }else{
                            echo "";
                        }
                    }
                 ?>
    </div>
    <div id="footer_col3">
        <font size="4"><strong>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="BUSINESS_TITLE" && $foot['language']=="en"){
                            echo $foot['title'];
                        }else{
                            echo "";
                        }
                    }
                ?>
        </strong></font><br>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="BUSINESS" && $foot['language']=="en"){
                            echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                        }else{
                            echo "";
                        }
                    }
                ?>
    </div>
</div>