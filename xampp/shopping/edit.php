<?php
// including the database connection file
include_once("dbconnect.php");
 
if(isset($_POST['update']))
{ 
    $product_id = $_POST['product_id'];
    
    $product=$_POST['product'];
    $price=$_POST['price'];
    //$email=$_POST['email'];    
    
    // checking empty fields
    //if(empty($name) || empty($age) || empty($email)) {            
    if(empty($product) || empty($price) ) {            
        if(empty($product)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($price)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
       // if(empty($email)) {
       //     echo "<font color='red'>Email field is empty.</font><br/>";
       // }        
    } else {     
        //updating the table
        $query_update = "UPDATE products SET product='$product',price='$price' WHERE product_id=$product_id"; 
        $result = mysql_query($query_update);
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
 $id = $_GET['id'];
 
//selecting data associated with this particular id


 

$result = mysql_query( "SELECT * FROM products WHERE product_id=$id");
 
while($res = mysql_fetch_assoc($result))
{
    $product_id = $res['product_id'];
    $product = $res['product'];
    $price = $res['price'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome - <?php echo $userRow['email']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="jumbotron text-center">
  <h1>
  	
  	<?php
          if($userRow['email'] == 'admin@gmail.com')
          	{ echo "Welcome Admin";}
          else{ echo "Welcome User"; }
  	?>

  </h1>
  <p>
  	
           <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['email']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>

  </p> 
</div>




    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0" >
            <tr>
                <td>Name</td>
                <td><input type="text" name="product" value="<?php echo $product;?>"></td>
            </tr>
            <tr>
                <td>price</td>
                <td><input type="text" name="price" value="<?php echo $price;?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="product_id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>