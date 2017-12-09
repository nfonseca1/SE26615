<?php
//including the database connection file


include_once("dbconnect.php");


 
if(isset($_POST['Submit'])) {    
    $product = $_POST['product'];
    $price = $_POST['price'];
    $category = $_POST['category'];
   // $email = $_POST['email'];
        
    // checking empty fields
    if(empty($product) || empty($price) || empty($category) ) {                
        if(empty($product)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($price)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
         if(empty($category)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
      echo  $insert_query = "INSERT INTO products(product,price,category_id) VALUES('$product','$price','$category')";
        $result = mysql_query($insert_query);
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}



   $res=mysql_query("SELECT * FROM categories" );

    //while($row = mysql_fetch_assoc($res)) { 
    //    echo $row['category'];
    //    echo $row['category_id'];
    //}

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
  






<form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="product"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="price"></td>
            </tr>

            <tr> 
                <td>Category</td>
                <td>
                    <select name="category">

                    <?php while($row = mysql_fetch_assoc($res)) {  ?>
                       <option value="<?php echo $row['category_id']?>"><?php echo $row['category']?></option>                      
                    <?php }  ?>   
                    </select>


                </td>
            </tr>
            

            
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>







</body>
</html>