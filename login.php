 <?PHP 
  session_start(); 
   include("dbconnection.php"); 
   // if the form is submitted or not 
   // if the form is submitted 
   if (isset($_POST['user_name']) and isset($_POST['password'])){ 
    // assign posted values to variables 
    $username = $_POST['user_name']; 
    $password = $_POST['password']; 
    // checking the values if exist in database or not 

    $query = "SELECT * FROM users WHERE user_name='$username' AND password='$password'"; 
    $result = mysqli_query($connect, $query); 
    $count = mysqli_num_rows($result); 
    // if the posted values are equal to the database values, then session will be created 
    if($count == 1){ 
      $row = mysqli_fetch_assoc($result); 
      
      $_SESSION["user_id"] = $row["user_id"];
      $_SESSION['user_name'] = $username;
      $_SESSION['firstName'] = $fname;
      $_SESSION['lastName'] = $lname;
      $_SESSION["type"] = $row['user_type_id'];  

	  if ($_SESSION["type"] == 2) {
		  header("Location: main.php");
      } else if ($_SESSION["type"] == 3) {
		  header("Location: cashier.php");
	  } else if ($_SESSION["type"] == 4) {
		  header("Location: SearchStock.php");
	  } else {
		  header("Location: logout.php");
	  }

    } else { 
    // if login credentials doesnt match, user will be shown with an error message
      //$error = "Your Username or Password is invalid."; 
        $_SESSION['errMsg'] = "Invalid username or password";
       header("location: log_in.php");
    }
    }

    // if user is logged in, greets user with message 
    // if(isset($_SESSION['user_name'])){ 
    //   $username = $_SESSION['user_name']; 

    //   header("location: main.php");
   
    // } else { 
    //   $error = "Your Login Name or Password is invalid";
    //   header("location: log_in.php");
    //   }
  ?>

