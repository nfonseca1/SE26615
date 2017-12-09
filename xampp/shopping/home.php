<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
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
          if($userRow['email'] == 'satyajeet.kesharia@gmail.com')
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
  
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      
    </div>
    <div class="col-sm-8">
      <h3 align="center">Products <a href="add.php"> add new product</a> </h3> 
      

			<?php
			//including the database connection file
			include_once("dbconnect.php");

  
  
   $res=mysql_query("SELECT * FROM products" );
   

			?>



			    <table width='100%'>
			        <tr bgcolor='#CCCCCC'>
			            <td>Name</td>
			            <td>Age</td>
			            <td>Image</td>
			            <td>Update</td>
			        </tr>
			        <?php
			        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
			        while($row = mysql_fetch_assoc($res)) {         
			            echo "<tr>";
			            echo "<td>".$row['product']."</td>";
			            echo "<td>".$row['price']."</td>";
			            echo "<td>".$row['product']."</td>";    
			            echo "<td><a href=\"edit.php?id=$row[product_id]\">Edit</a> | <a href=\"delete.php?id=$row[product_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
			        }
			        ?>
			    </table>


    </div>
    <div class="col-sm-2">
      
    </div>
  </div>
</div>

</body>
</html>
<?php ob_end_flush(); ?>