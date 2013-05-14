<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/global/modulos/footer/css/footer.css" media="screen" />

<?php
include_once $PATH_MODULOS_GLOBAL.'footer/lib/FooterList.php';
$footer = new FooterList();

?>

<div id="footer_container">
    <div id="footer_col1">
        <font size="4"><strong>
                <?php
                    foreach ($footer->listar() as $foot){
                        if($foot['source']=="CMS_TITLE" && $foot['language']=="pt"){
                            echo $foot['title'];
                        }else{
                            echo "";
                      }
                    }
                ?>
        </strong></font><br>
                <?php
                    foreach ($footer->listar() as $foot){
                      if($foot['source']=="CMS" && $foot['language']=="pt"){
                         echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                      }else{
                         echo "";
                      }
                    }
        ?>
    </div>
    <div id="footer_col2">
        <font size="4"><strong>Consumidor</strong></font><br>
        Fale Conosco
    </div>
    <div id="footer_col3">
        <font size="4"><strong>Empresas</strong></font><br>
        Anuncie Gratis<br>
        Programa de Banner
    </div>
</div>