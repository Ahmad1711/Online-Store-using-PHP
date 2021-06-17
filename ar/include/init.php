<?php
session_start();
$con=mysqli_connect("localhost","root","","db_1");
//$con=mysqli_connect("localhost","d3scit","_lZZNCJxy{T%","d3scit_db_1");
mysqli_set_charset($con,"utf8");
//-----------------------------
//function testimagesize($image)
//{
//	$bool=0;
//	list($width, $height) = getimagesize($image);
//	if($width==150&&$height==150)
//	{
//	$bool=1;
//	}
//	return $bool;
//}
//--------------------------------
function get_product_category($id)
{
	global $con;
    $query="select category_id from product where id='$id'";
    $result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
    return $row["category_id"];
}
//-----------------------------------
function get_product_category_products($cate,$pid)
{

	global $con;
    $query="select id,name,image,price,family_id from product where category_id='$cate' and id!='$pid'";
    $result=mysqli_query($con,$query);
    return $result;
}
//---------------------------
function get_category()
{
    global $con;
    $query="select id,ar_name from category";
    $result=mysqli_query($con,$query);
    return $result;
}
//-------------------------
function get_category_Products($id)
{

	global $con;
    $query="select id,name,image,price,family_id from product where category_id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//-------------------------
function get_last_3_products()
{
    global $con;
    $query="select id,name,price,image,family_id from product order by id desc limit 3";
    $result=mysqli_query($con,$query);
    return $result;
}
//-------------------------
function get_top_3_category()
{
	global $con;
    $query="select category.id,category.ar_name,category.image,count(product.id) as count from product join category on category.id = category_id group by category.name order by count desc limit 3 ";
    $result=mysqli_query($con,$query);
    return $result;
}
//----------------------------
function get_top_4_category()
{
    global $con;
    $query="select category.id,category.ar_name,category.image,count(product.id) as count from product join category on category.id = category_id group by category.name order by count desc limit 4 ";
    $result=mysqli_query($con,$query);
    return $result;
}
//--------------------------
function get_product($id)
{
    global $con;
    $query="select product.name as pname,description,product.image,price,family.name as fname,family_id from product inner join family on family_id=family.id where product.id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//-------------------------
function register_family($name,$address,$image,$email,$phone,$delivery_city,$payment_type,$driver,$pass)
{
    global $con;
	$img=basename($image);
	upload_image($img);
    $query="insert into family(name,address,image,email,phone,delivery_city,payment_type,driver,password) values('$name','$address','$img','$email','$phone','$delivery_city','$payment_type','$driver','$pass')";
    if(mysqli_query($con, $query))
    {
	echo '<script>window.location="login_family.php"</script>';
    }
    else{
 	echo '<script>window.location="registered_family.php"</script>';
    }
}
//-----------------------
function login_family($email,$pass)
{
    global $con;
    $query="select id,name,address from family where email='$email' and password='$pass'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
	$row=mysqli_fetch_array($result);
	$_SESSION['user_name']=$row["name"];
	$_SESSION['family_id']=$row["id"];
	$_SESSION['family_address']=$row["address"];
	echo '<script>window.location="family.php?id='.$_SESSION['family_id'].'"</script>';
    }
    else{
    echo '<script>alert("الايميل أو كلمة المرور غير صحيح")</script>';
    } 
}
//-----------------------
function get_family_Products($id)
{
    global $con;
    $query="select product.id,product.name as pname,family.name as fname,product.image,price,family_id from product inner join family on family_id=family.id where family_id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//----------------------
function add_product($pname,$cat,$price,$about,$image,$family)
{
	global $con;
	$img=basename($image);
	upload_image($img);
	$query="insert into product (name,category_id,price,description,image,family_id) values ('$pname','$cat','$price','$about','$img','$family')";
	if(mysqli_query($con,$query))
	{
	echo "<script>alert('تمت الاضافة بنجاح')</script>";
	}
}
//-----------------------
function register_customer($fname,$lname,$address,$phone,$email,$pass)
{
    global $con;
    $query="insert into customer(fname,lname,address,phone,email,password) values('$fname','$lname','$address','$phone','$email','$pass')";
    if(mysqli_query($con, $query))
    {
	echo '<script>window.location="login_customer.php"</script>';
    }
    else{
	echo '<script>window.location="registered_customer.php"</script>';
    }
}
//----------------------
function login_customer($email,$pass)
{
    global $con;
    $query="select id,fname from customer where email='$email' and password='$pass'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
	$row=mysqli_fetch_array($result);
	$_SESSION['user_name']=$row["fname"];
	$_SESSION['customer_id']=$row["id"];
	echo '<script>window.location="customer.php?id='.$_SESSION['customer_id'].'"</script>';
    }
    else{
      echo '<script>alert("الايميل او كلمة المرور غير صحيح")</script>';
    } 
}
//--------------------------
function get_family($id)
{
    global $con;
    $query="select name,address,email,phone,delivery_city,payment_type,driver,password from family where id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------
function edit_family($id,$name,$address,$email,$phone,$pass)
{
    global $con;
    $query="update family set name='$name',address='$address',email='$email',phone='$phone',password='$pass' where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم التعديل بنجاح')</script>";
	}
}
//------------------------
function upload_image($img)
{
move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$img);
}
//-----------------------
function delete_product($id)
{
	global $con;
    $query="delete from product where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم الحذف بنجاح')</script>";
	}
}
//-----------------------
function edit_product($id,$name,$cat_id,$price,$image)
{
	global $con;
    $query="update product set name='$name',category_id='$cat_id',price='$price',image='$image' where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم التعديل بنجاح')</script>";
	}
}
//----------------------
function test_family_session()
{
   if(!isset($_SESSION['family_id'])){
	
	echo '<script>window.location="index.php"</script>';
    //header("location:index.php");
   }
}
//-------------------------
function test_customer_session()
{
   if(!isset($_SESSION['customer_id'])){
	
	echo '<script>window.location="index.php"</script>';
      //header("location:index.php");
   }
}
//---------------------------
function test_inspector_session()
{
   if(!isset($_SESSION['inspector_id'])){
	
	echo '<script>window.location="login_inspector.php"</script>';
      //header("location:login_inspector.php");
   }
}
//---------------------------
function test_organizer_session()
{
   if(!isset($_SESSION['organizer_id'])){
	
	echo '<script>window.location="login_organizer.php"</script>';
	//header("location:login_organizer.php");
    
   }
}
//--------------------------
function test_admin_session()
{
   if(!isset($_SESSION['admin_id'])){
	
	echo '<script>window.location="admin.php"</script>';
      //header("location:admin.php");
   }
}
//--------------------------
function register($name,$role,$card_id,$email,$pass)
{
    global $con;
    $query="insert into admin(name,role,card_id,email,password) values('$name','$role','$card_id','$email','$pass')";
    if(mysqli_query($con, $query))
    {
	echo '<script>alert("تم التسجيل بنجاح")</script>';
    }else{
	echo '<script>alert("فشل التسجيل")</script>';
	}
}
//----------------------------
function login_admin($email,$pass)
{
    global $con;
    $query="select id,name from admin where email='$email' and password='$pass' and role='Admin'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
	$row=mysqli_fetch_array($result);
	$_SESSION["user_name"]=$row["name"];
	$_SESSION["admin_id"]=$row["id"];
	echo '<script>window.location="control_panel.php?id='.$_SESSION["admin_id"].'"</script>';
    }
    else{
	echo '<script>window.location="admin.php"</script>';	
    //header("location:admin.php");
    } 
}
//--------------------------
function login_inspector($card_id,$pass)
{
    global $con;
    $query="select id,name from admin where card_id='$card_id' and password='$pass' and role='Inspector'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
	$row=mysqli_fetch_array($result);
	$_SESSION["user_name"]=$row["name"];
	$_SESSION["inspector_id"]=$row["id"];
	echo '<script>window.location="bad_product.php?id='.$_SESSION["inspector_id"].'"</script>';
    //header("location:bad_product.php?id=".$_SESSION["inspector_id"]);
    }
    else{
	echo '<script>window.location="login_inspector.php"</script>';
    //header("location:login_inspector.php");
    } 
}
//--------------------------
function login_organizer($email,$pass)
{
    global $con;
    $query="select id,name from admin where email='$email' and password='$pass' and role='Organizer'";
    $result=mysqli_query($con,$query);
    $count=mysqli_num_rows($result);
    if($count==1){
	$row=mysqli_fetch_array($result);
	$_SESSION["user_name"]=$row["name"];
	$_SESSION["organizer_id"]=$row["id"];
	echo '<script>window.location="add_event.php?id='.$_SESSION["organizer_id"].'"</script>';
    //header("location:add_event.php?id=".$_SESSION["organizer_id"]);
    }
    else{
	echo '<script>window.location="login_organizer.php"</script>';
    //header("location:login_organizer.php");
    } 
}
//--------------------------
function add_to_cart($id,$name,$price,$quantity,$family_id)
{
	if(isset($_SESSION['cart']))
	{
		$item_array_id=array_column($_SESSION['cart'],'id');
		if(!in_array($id,$item_array_id))
		{
			$count=count($_SESSION['cart']);
			$item_array=array("id"=>$id,"name"=>$name,"price"=>$price,"quan"=>$quantity,"family_id"=>$family_id);
			$_SESSION['cart'][$count]=$item_array;
			echo '<script>window.location="mycart.php"</script>';
		}
		else{
			echo '<script>alert("تمت اضافة هذا المنتج مسبقا")</script>';
		}
	}
	else{
		$item_array=array("id"=>$id,"name"=>$name,"price"=>$price,"quan"=>$quantity,"family_id"=>$family_id);
		$_SESSION['cart'][0]=$item_array;
		echo '<script>window.location="mycart.php"</script>';
	}
}
//--------------------------
function delete_from_cart($id)
{
foreach($_SESSION['cart'] as $keys => $values)
{
	if($values['id']==$id)
	{
	unset($_SESSION['cart'][$keys]);
	echo '<script>alert("تم الحذف بنجاح")</script>';
	echo '<script>window.location="mycart.php"</script>';
	}
}
}
//--------------------------
//function update_cart_quantity($id,$new_quantity)
//{
//	
//foreach($_SESSION['cart'] as $keys => $values)
//{
//	if($values['id']==$id)
//	{
//	
//	echo '<script>alert("Quantity Updated for Item")</script>';
//	echo '<script>window.location="mycart.php"</script>';
//	}
//}	
//}
//---------------------------
function get_customer($id)
{
    global $con;
    $query="select fname,lname,address,phone,email,password from customer where id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------
function edit_customer($id,$fname,$lname,$address,$phone,$email,$pass)
{
    global $con;
    $query="update customer set fname='$fname',lname='$lname',address='$address',email='$email',phone='$phone',password='$pass' where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم التعديل بنجاح')</script>";
	}
}
//------------------------
function get_all_products()
{
	global $con;
    $query="select id,name,image,category_id,description,price,family_id from product";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------
function get_all_families()
{
	global $con;
    $query="select id,name,address,image,email,phone,delivery_city,payment_type,driver from family";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------
function search($name)
{
	$result=get_product_id($name);
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if($count==1){
	echo '<script>window.location="product.php?id='.$row["id"].'"</script>';
	//header('Location:product.php?id='.$row["id"]);
	}
	else{
	$result=get_family_id($name);
	$row=mysqli_fetch_array($result);
	echo '<script>window.location="family_products.php?id='.$row["id"].'"</script>';
	//header('Location:family_products.php?id='.$row["id"]);
	}
	
}
//----------------------
function get_product_id($name)
{
	global $con;
    $query="select id from product where name='$name'";
    $result=mysqli_query($con,$query);
    return $result;
}
//--------------------------
function get_family_id($name)
{
	global $con;
    $query="select id from family where name='$name'";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------
function go_to_checkout()
{
	if(!isset($_SESSION['customer_id']))
	{
	echo '<script>alert(" من فضلك سجل الدخول ك زبون ")</script>';		
	}
	else{
	echo '<script>window.location="checkout.php"</script>';
	//header('Location:checkout.php');
	}
}
//-----------------------
function confirm_purchase($order_date,$customer_id,$total,$pick,$delivery_type,$delivery_location,$address,$delivery_date)
{
    global $con;
    $query="insert into bill(order_date,customer_id,total,pickup_cost,delivery_type,delivery_location,address,delivery_date) values('$order_date','$customer_id','$total','$pick','$delivery_type','$delivery_location','$address','$delivery_date')";
    if(mysqli_query($con, $query))
    {
	$order_id=get_last_order_id();
	foreach($_SESSION['cart'] as $keys => $values)
    {
    insert_bill_items($order_id,$values["id"],$values["quan"],$values["family_id"]);
    }
	$_SESSION['cart']=array();
	echo '<script>alert("تم تأكيد الطلب شكرا لك")</script>';
    }
	echo '<script>window.location="customer.php?id='.$_SESSION["customer_id"].'"</script>';
	//header("location:customer.php?id=".$_SESSION["customer_id"]);
}
//-----------------------
function insert_bill_items($order_id,$pid,$amount,$fid)
{
    global $con;
    $query="insert into item(bill_id,product_id,amount,family_id) values('$order_id','$pid','$amount','$fid')";
    mysqli_query($con, $query);
}
//-----------------------
function get_last_order_id()
{
	global $con;
    $query="select id from bill order by id desc limit 1";
    $result=mysqli_query($con, $query);
	$row=mysqli_fetch_array($result);
	return $row["id"];
}
//-----------------------
function get_related_customers($cid,$pid)
{
	global $con;
    $query="select distinct customer_id from related_product where product_id='$pid' and customer_id != $cid";
    $result=mysqli_query($con, $query);
	return $result;
}
//----------------------
function related_products($cid,$pid)
{
	global $con;
	$query="insert into related_product (customer_id,product_id) values('$cid','$pid')";
	mysqli_query($con,$query);
}
//----------------------
function get_recommendation($cid,$pid)
{
	global $con;
	$query="select distinct product_id from related_product where customer_id='$cid' and product_id != '$pid'";
	$result=mysqli_query($con,$query);
	return $result;
}
//----------------------
function get_best_selling_products($id)
{
	global $con;
	$query="select product_id,product.name,product.image,sum(amount) as amount from product,item where product.id=product_id and item.family_id='$id' group by product_id order by amount desc";
	$result=mysqli_query($con, $query);
	return $result;
}
//--------------------
function get_Last_events()
{
	global $con;
    $query="select event_name,description,date,image from event ";
    $result=mysqli_query($con, $query);
	return $result;
}
//-----------------------
function add_event($ename,$desc,$date,$image)
{
	global $con;
	$img=basename($image);
	upload_image($img);
	$query="insert into event (event_name,description,date,image) values ('$ename','$desc','$date','$image')";
	if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم الاضافة بنجاح')</script>";
	}
}
//-------------------------
function send_report($pname,$task_id,$desc)
{
	global $con;
    $query="insert into bad_product(product_name,task_id,task_text)values('$pname','$task_id','$desc')";
    if(mysqli_query($con, $query))
	{
		echo "<script>alert('تم الارسال بنجاح')</script>";
	}
}
//-------------------------
function send_eval($cid,$pid,$star,$text,$fid)
{
	global $con;
    $query="insert into rating(customer_id,product_id,star_rate,text_rate,family_id)values('$cid','$pid','$star','$text','$fid')";
    if(mysqli_query($con, $query))
	{
		echo "<script>alert('تم الارسال بنجاح')</script>";
	}

}
//-----------------------------
function get_rate($pid)
{
	global $con;
    $query="select customer_id,product_id,avg(star_rate) as star,text_rate from rating where product_id='$pid'";
    $result=mysqli_query($con, $query);
	return $result;
}
//----------------------------
function get_family_rate($fid)
{
	global $con;
    $query="select customer_id,product_id,text_rate from rating where family_id='$fid'";
    $result=mysqli_query($con, $query);
	return $result;
}
//-----------------------------
function get_customer_request($cid)
{
	global $con;
    $query="select id,order_date,total,pickup_cost,payment_type,delivery_type,delivery_location,delivery_date from bill where customer_id='$cid'";
    $result=mysqli_query($con, $query);
	return $result;
}
//-----------------------------
function get_family_request($fid)
{
	global $con;
    $query="select distinct bill_id from item where family_id='$fid'";
    $result=mysqli_query($con, $query);
	return $result;
}
//-------------------------------
function get_request_info($id)
{
	global $con;
    $query="select order_date,customer_id,total,pickup_cost,payment_type,delivery_type,delivery_location,delivery_date from bill where id='$id'";
    $result=mysqli_query($con, $query);
	return $result;
}
//-------------------------------
function edit_admin($id,$name,$email,$pass)
{
	global $con;
    $query="update admin set name='$name',email='$email',password='$pass' where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم التعديل بنجاح')</script>";
	}
}
//---------------------------------
function get_admin($id)
{
    global $con;
    $query="select name,email,password from admin where id='$id'";
    $result=mysqli_query($con,$query);
    return $result;
}
//--------------------------------
function get_cate_name($id)
{
	global $con;
    $query="select ar_name from category where id='$id'";
    $result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
    return $row["ar_name"];
}
//------------------------------------
function get_all_customers()
{
	global $con;
    $query="select id,fname,lname,address,phone,email from customer";
    $result=mysqli_query($con,$query);
    return $result;
}
//------------------------------------
function delete_customer($id)
{
	global $con;
    $query="delete from customer where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم الحذف بنجاح')</script>";
	}
}
//------------------------------------
function delete_family($id)
{
	global $con;
    $query="delete from family where id='$id'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم الحذف بنجاح')</script>";
	}
}
//------------------------------------
function get_all_bad_product()
{
	global $con;
    $query="select product_name,task_id,task_text from bad_product";
	$result=mysqli_query($con,$query);
	return $result;
}
//------------------------------------
function get_all_requests()
{
	global $con;
    $query="select id,order_date,customer_id,total,pickup_cost,payment_type,delivery_type,delivery_location,delivery_date from bill";
	$result=mysqli_query($con,$query);
	return $result;
}
//-----------------------------------
function get_request_products($id)
{
	global $con;
    $query="select product_id,amount,family_id,status,explanation from item where bill_id='$id'";
	$result=mysqli_query($con,$query);
	return $result;
}
//-----------------------------------
function delete_request($id)
{
	global $con;
	$query="delete from bill where id='$id'";
	if(mysqli_query($con,$query))
	{
		echo "<script>alert('تم الحذف بنجاح')</script>";
	}
}
//-----------------------------------
function test_request_status($id)
{
	global $con;
	$query="select status from item where bill_id='$id'";
	$result=mysqli_query($con,$query);
	$bool=true;
	while($row=mysqli_fetch_array($result))
	{
		if($row["status"]=='waiting'){
			$bool=false;
			break;
		}
	}
	return $bool;
}
//----------------------------------------
function set_request_info($rid,$pid,$status,$explan)
{
	global $con;
    $query="update item set status='$status',explanation='$explan' where bill_id='$rid' and product_id='$pid'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تم الارسال بنجاح')</script>";
	}
}
//------------------------------------------
function add_pickup_cost($rid,$pick_cost)
{
	global $con;
	$query="update bill set pickup_cost=pickup_cost+'$pick_cost' where id='$rid'";
    if(mysqli_query($con,$query))
	{
	echo "<script>alert('تمت الاضافة بنجاح')</script>";
	}
}
//------------------------------------------
function go_to_payment($id)
{
	echo '<script>window.location="payment.php?request_id='.$id.'"</script>';
	//header('Location:payment.php?request_id='.$id);
}
//--------------------------------------------
function get_payment_products($id)
{
	global $con;
    $query="select product_id,amount from item where bill_id='$id' and status='accept'";
	$result=mysqli_query($con,$query);
	return $result;
}
//--------------------------------------------
function edit_payment_type($id,$payment)
{
	global $con;
    $query="update bill set payment_type='$payment' where id='$id'";
    mysqli_query($con,$query);
}
//--------------------------------------------
function send_problem($user,$account,$desc,$date)
{
	global $con;
    $query="insert into problem(user_name,account_type,description,problem_date)values('$user','$account','$desc','$date')";
    if(mysqli_query($con, $query))
	{
		echo "<script>alert('تم الارسال بنجاح')</script>";
	}
}
//----------------------------------------------
function get_all_problems()
{
	global $con;
    $query="select user_name,account_type,description,problem_date from problem ";
	$result=mysqli_query($con,$query);
	return $result;
}
//---------------------------------------------
function check_customer_rate($cid,$pid)
{
	global $con;
	$bool=1;
    $query="select id from rating where customer_id='$cid' and product_id='$pid' ";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		$bool=0;
	}
	return $bool;
}
//--------------------------------------------
function get_email($cid)
{
	global $con;
	$query="select email from customer where id='$cid' ";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
	return $row["email"];
}
//---------------------------------------------

?>
