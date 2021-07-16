<?
include_once("mem/includes/config.php");
$sqlsearch = "SELECT * FROM categories WHERE title = '$_SESSION[more]'";
$resultsearch = mysql_query($sqlsearch);
$rowsearch = mysql_fetch_array($resultsearch)
?>
<style type="text/css">
.gettingthere:link { 
color:#381B01;
text-decoration:none;
}

.gettingthere:hover { 
color:#993300;
text-decoration:none;
}

.gettingthere:active { 
color:#381B01;
text-decoration:none;
}

.gettingthere:visited { 
color:#381B01;
text-decoration:none;
}

</style>
<h3><? echo $rowsearch['title']; ?></h3>
				<hr>
				Please click on the following <? echo $rowsearch['title']; ?> for more information.<br />
&nbsp;<table cellSpacing="0" cellPadding="5" width="100%" border="0" id="table10">
					<? 
					$sqlmore = "SELECT * FROM armenities WHERE category = '$rowsearch[title]' ORDER BY display_name ASC";
					$resultmore = mysql_query($sqlmore);
					while ($rowmore = mysql_fetch_array($resultmore))
					{
					?>
                    
                    <tr>
						<td class="bk3" vAlign="top" width="35%" height="20">
						<? if ($rowmore['url'] != '') { ?><a class="gettingthere" href="http://<? echo $rowmore['url']; ?>" target="_blank"><? } ?>
						<? echo $rowmore['display_name']; ?><? if ($rowmore['url'] != '') { ?></a><? } ?></td>
						<td class="bk" vAlign="top" width="65%"><? echo $rowmore['address']; ?><br>
						<? if ($rowmore['telephone'] != "") { ?>
                        Tel: <? echo $rowmore['telephone']; ?>
                        <? } ?>
                        <? if ($rowmore['fax'] != "") { ?>
                        <br>
						Fax: <? echo $rowmore['fax']; ?>
                        <? } ?>
                        <? if ($rowmore['emergency'] != "") { ?>
                        <br>
                        Emergency: <? echo $rowmore['emergency']; ?>
                        <? } ?></td>
					</tr>
                    <?
                    }
					?>
				</table>
				<br>
				<br><br>