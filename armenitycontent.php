<?php
include_once("mem/includes/config.php");
$moreString = $_SESSION['more'];
$escapedString = mysqli_real_escape_string($conn, $moreString);
$sqlsearch = "SELECT * FROM categories WHERE title = '".$escapedString."'";
$resultsearch = mysqli_query($conn, $sqlsearch) or mysqli_error($conn);
$rowsearch = mysqli_fetch_array($resultsearch);

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
<h3><?php echo $rowsearch['title']; ?></h3>
				<hr>
				Please click on the following <?php echo $rowsearch['title']; ?> for more information.<br />
&nbsp;<table cellSpacing="0" cellPadding="5" width="100%" border="0" id="table10">
					<?php 
					$sqlmore = "SELECT * FROM armenities WHERE category = '".$rowsearch['title']."' ORDER BY display_name ASC";
					$resultmore = mysqli_query($conn, $sqlmore);
					while ($rowmore = mysqli_fetch_array($resultmore))
					{
					?>
                    
                    <tr>
						<td class="bk3" vAlign="top" width="35%" height="20">
						<?php if ($rowmore['url'] != '') { ?><a class="gettingthere" href="http://<?php echo $rowmore['url']; ?>" target="_blank"><?php } ?>
						<?php echo $rowmore['display_name']; ?><?php if ($rowmore['url'] != '') { ?></a><?php } ?></td>
						<td class="bk" vAlign="top" width="65%"><?php echo $rowmore['address']; ?><br>
						<?php if ($rowmore['telephone'] != "") { ?>
                        Tel: <?php echo $rowmore['telephone']; ?>
                        <?php } ?>
                        <?php if ($rowmore['fax'] != "") { ?>
                        <br>
						Fax: <?php echo $rowmore['fax']; ?>
                        <?php } ?>
                        <?php if ($rowmore['emergency'] != "") { ?>
                        <br>
                        Emergency: <?php echo $rowmore['emergency']; ?>
                        <?php } ?></td>
					</tr>
                    <?php
                    }
					?>
				</table>
				<br>
				<br><br>