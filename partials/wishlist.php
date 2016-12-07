<?php
require_once("../php/login.php");
require_once("../php/db.php");

function get_wishlist($conn, $userId)
{
	$statement = $conn->query("select * from Wishlist where userId = $userId");
	$wishlist = Array();
	foreach($statement as $row)
	{
		$itemId = $row["itemId"];
		$dateAdded = $row["dateAdded"];
		array_push($wishlist, Array("itemId"=>$itemId, "dateAdded"=>$dateAdded));
	}
	return $wishlist;
}

function get_userId()
{
	if(isset($_SESSION['userId']) && $_SESSION['userId'])
		return (int) $_SESSION['userId'];
	else
		return -1;
}

function create_form($wishlist)
{
echo <<<END
<form id="checkout_form" name="checkout_form" class="form-horizontal" method="post" action="">
        <legend>Wishlist</legend>
<table class="table table-striped table-hover ">
<tr>
	<th></th>
	<th>Item Name</th>
	<th>Date Added</th>
</tr>
END;

	$count = 0;
	foreach($wishlist as  $item)
	{
		$count = $count + 1;
		echo '<tr><td align="center"><input type="checkbox" id="case'.$count.' name="case'.$count.'" value="1"/></td>';
		echo '<td>'.$item['itemId'].'</td>';
		echo '<td>'.$item['dateAdded'].'</td>';
		echo '</tr>';
	}

echo <<<END

</table>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
END;
}


//----Main----
$conn = get_MYSQLi_Connection();
$wishlist_items = get_wishlist($conn, get_userId());
create_form($wishlist_items);

?>
