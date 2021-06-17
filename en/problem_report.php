<?php
include("include/init.php");
test_admin_session();
?>
<!DOCTYPE html>
<html>
<head>
<?php
include("include/head.html");?>
</head>
<body>
<?php
include("include/test_header.php");
$result=get_all_problems();
echo'
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1">
        <li><a href="control_panel.php?id='.$_SESSION['admin_id'].'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Control Panel</a></li>
        <li class="active">Problems</li>
        </ol>
    </div>
</div>';
?>
<div class="checkout">
<div class="container">
<div class="checkout-right">
<table class="timetable_sub">
<thead>
	<tr>
        <th>User_Name</th>
		<th>Account_Type</th>
        <th>Description</th>
		<th>Problem_Date</th>
	</tr>
</thead>
<?php
while($row=mysqli_fetch_array($result))
{
echo '
<tr class="rem1">
	<td class="invert">'.$row["user_name"].'</td>
	<td class="invert">'.$row["account_type"].'</td>
	<td class="invert">'.$row["description"].'</td>
	<td class="invert">'.$row["problem_date"].'</td>
</tr>';    
}
?>
</table>
</div>
</div>
</div>
<?php
include("include/test_footer.php");
?>
</body>
</html>