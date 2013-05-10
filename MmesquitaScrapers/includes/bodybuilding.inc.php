<?php

function grab_records()
{		

		global $cookie_file_path, $filename, $sqlLink;

		$counter = 0;
		$cdate = date("Y-m-d H:i:s");

		$url1 = "http://www.bodybuilding.com/store/listing.htm";
		$result1 = get_curl($url1,"","","http://www.bodybuilding.com/",true);
		$result1 = eregi_replace('.*Shop By Brand Popularity','',$result1);

		preg_match_all('|<li><a href=\"([^\"]*)\">([^\<]*)<\/a><\/li>|', $result1, $brands);

		for($x=0;$x<count($brands[1]);$x++)
		{
			echo '<br><b>======================================================</b><br>';
			echo 'Grabbing Brand [ '.($x+1).' - '.count($brands[1]).' ]: <b>'.$brands[2][$x].'</b></b>';
			echo '<br><b>======================================================</b><br><br>';
			flush();
						
			$url2 = "http://www.bodybuilding.com".$brands[1][$x]."?pageSize=50";
			$result2 = get_curl($url2,"","",$url1,true);
		
			$prod = explode('class="product-image">',$result2);

			for($y=1;$y<count($prod);$y++)
			{

					$counter++;
						
					echo "<b>Grabbing record $counter...</b><br><br>";
					flush();
								
					preg_match('|<div class=\"img\">\s+<a href=\"([^\"]*)\"><img src=\"([^\"]*)\"|', $prod[$y], $rec1);
					preg_match('|<h3><a href=\"([^\"]*)\">([^\<]*)<\/a><\/h3>|', $prod[$y], $rec2);
					preg_match('|store-layout-price">\s+([^\<]*)</div>|', $prod[$y], $rec3);
					//preg_match('|store-layout-price">\s+([^\<]*)</div>|', $prod[$y], $rec4);
					
					//Supported Goal:</strong>\s+<a href="/store/goalwell.htm">Health &amp; Wellness</a>
					$price = trim($rec3[1]);
					$title = trim(eregi_replace(",.*","",$rec2[2]));
					$size = trim(eregi_replace(".*,","",$rec2[2]));
					
					$purl = eregi_replace(";jsess.*","",$rec1[1]);
								
					//$url3 = $rec1[1];
					//$result3 = get_curl($url3,"","",$url2,true);
					
					//preg_match('|SKU\:<\/strong><\/label>([^\<]*)<\/p>|', $result3, $rec3);
					//preg_match('|<span class=\"price\">([^\<]*)<\/span>|', $result3, $rec4);
					//preg_match('|<span class=\"price\">([^\<]*)<\/span>|', $result3, $rec5);
					
					//$sku = trim($rec3[1]);
					
					//echo "Item Number: ".$sku."<br>";
					echo "Title: ".$title."<br>";
					echo "Brand: ".$brands[2][$x]."<br>";
					echo "Price: ".$price."<br>";
					echo "Size: ".$size."<br>";
					echo "Image: ".$rec1[2]."<br>";
					
					$strQRY = "SELECT * FROM tbl_products where Identifier='".$purl."'";
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
						$strQRY = "INSERT INTO `tbl_products` (`Title`, `Brand`, `Price`, `Size`, `Image`, `Identifier`, `Source`, `DateUpdated`) VALUES ('".str_replace("'","''",$title)."', '".str_replace("'","''",$brands[2][$x])."', '".$price."', '".$size."', '".trim($rec1[2])."', '".$purl."', 'bodybuilding', '".$cdate."');";
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