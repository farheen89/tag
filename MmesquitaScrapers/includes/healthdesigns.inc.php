<?php

function grab_records()
{		

		global $cookie_file_path, $filename, $sqlLink;

		$counter = 0;
		$cdate = date("Y-m-d H:i:s");

		$url1 = "http://www.healthdesigns.com/brands";
		$result1 = get_curl($url1,"","","http://www.healthdesigns.com/",true);
		$result1 = eregi_replace('<ul class="footer-links">.*','',$result1);

		preg_match_all('|<li><a href=\"([^\"]*)\">([^\<]*)<\/a><\/li>|', $result1, $brands);

		for($x=0;$x<count($brands[1]);$x++)
		{
			echo '<br><b>======================================================</b><br>';
			echo 'Grabbing Brand [ '.($x+1).' - '.count($brands[1]).' ]: <b>'.$brands[2][$x].'</b></b>';
			echo '<br><b>======================================================</b><br><br>';
			flush();
						
			$url2 = "http://www.healthdesigns.com/".$brands[1][$x]."?limit=1000";
			$result2 = get_curl($url2,"","",$url1,true);
			$result2 = str_replace('<!-- <div class="product-name"><h1> -->','',$result2);
			$result2 = str_replace('<!-- </h1> </div> -->','',$result2);
		
			$prod = explode('<li class="item',$result2);

			for($y=1;$y<count($prod);$y++)
			{

					$counter++;
						
					echo "<b>Grabbing record $counter...</b><br><br>";
					flush();
								
					preg_match('|<a href=\"([^\"]*)\" title=\"([^\"]*)\" class=\"product-image\"><img src=\"([^\"]*)\" width=|', $prod[$y], $rec1);
					preg_match('|Our Price\:<\/span>\s+<span([^\>]*)>\s+(.*)\s+<\/span>|', $prod[$y], $rec2);
					if(trim($rec2[2])=="")
					{
						preg_match('|<span class=\"price\">([^\<]*)<\/span>|', $prod[$y], $rec2);
						$price = trim($rec2[1]);
					}
					else
					{
						$price = trim($rec2[2]);
					}
								
					//$url3 = $rec1[1];
					//$result3 = get_curl($url3,"","",$url2,true);

					//echo "Item Number: ".$products1[$sku]['TLNPN']."<br>";
					echo "Title: ".$rec1[2]."<br>";
					echo "Brand: ".$brands[2][$x]."<br>";
					echo "Price: ".$price."<br>";
					echo "Image: ".$rec1[3]."<br>";
					
					$strQRY = "SELECT * FROM tbl_products where Identifier='".$rec1[1]."'";
					$rsProducts = ors($strQRY, $sqlLink);
						
					if(mysql_num_rows($rsProducts)>0)
					{
						$rowProducts =  mysql_fetch_array($rsProducts, MYSQL_ASSOC);
						$pid = $rowProducts['PId'];
						
						$strQRY = "UPDATE `tbl_products` SET `Price`='".$price."', `DateUpdated`='".$cdate."' WHERE PId='".$pid."';";
						$rs = mysql_query($strQRY, $sqlLink) or die(mysql_error());
						echo "<br><font color='red'><b>Error:</b> Product already existed, Updated Successfully.</font><br>";
					}
					else
					{
						$strQRY = "INSERT INTO `tbl_products` (`Title`, `Brand`, `Price`, `Size`, `Image`, `Identifier`, `Source`, `DateUpdated`) VALUES ('".str_replace("'","''",trim($rec1[2]))."', '".str_replace("'","''",$brands[2][$x])."', '".$price."', '', '".trim($rec1[3])."', '".$rec1[1]."', 'healthdesigns', '".$cdate."');";
						$rs = mysql_query($strQRY, $sqlLink) or die(mysql_error());
		
						echo "<br><b>Success:</b> Product added to Database Successfully.<br>";
					}
					echo "<b>------------------------------------------</b><br><br>";
					echo str_repeat(" ", 500);
    				ob_flush();
      				flush();

			}
			//break;
		}

		return $counter;
}

?>