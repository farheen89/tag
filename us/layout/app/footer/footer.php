<link rel="stylesheet" type="text/css" href="http://www.blue-broker.com.br/core/app/footer/css/footer.css" media="screen" />

<?php

include_once $PATH_APP_CORE.'analytics/google.php';

include_once $PATH_APP_CORE.'footer/lib/FooterList.php';
$footer = new FooterList();
?>

<div id="footer_container">
    <div id="footer_col1">

                <?php
                $footer = new FooterList();
                $where = "source";
                $like = "'CMS_TITLE' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo '<strong>'.$foot['title'].'</strong></br>';
                }

                $footer = new FooterList();
                $where = "source";
                $like = "'CMS' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                }
                ?>
    </div>
    <div id="footer_col2">
                <?php
                $footer = new FooterList();
                $where = "source";
                $like = "'SUPPORT_TITLE' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo '<strong>'.$foot['title'].'</strong></br>';
                }

                $footer = new FooterList();
                $where = "source";
                $like = "'SUPPORT' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                }
                 ?>
    </div>
    <div id="footer_col3">
                <?php
                $footer = new FooterList();
                $where = "source";
                $like = "'BUSINESS_TITLE' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo '<strong>'.$foot['title'].'</strong></br>';
                }

                $footer = new FooterList();
                $where = "source";
                $like = "'BUSINESS' AND language LIKE 'en'";
                $order = "`order`";
                $footer->setWhere($where);
                $footer->setLike($like);
                $footer->setOrder($order);
                $footerr = $footer->listWhereLikeOrder();
                foreach ($footerr as $foot){
                    echo "<li><a href=\"".$foot['url']."\" target=\"_blank\">".$foot['title']."</a></li>";
                }
                ?>
    </div>
    <div id="copyright">
        Copyright &copy;2013 SportingTag.com, Inc. All Rights Reserved
    </div>
</div>