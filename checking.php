<?
session_start();
include ("mem/includes/config.php");
/**
 * Checks whether or not the given username is in the
 * database, if so it checks if the given password is
 * the same password in the database for that user.
 * If the user doesn't exist or if the passwords don't
 * match up, it returns an error code (1 or 2). 
 * On success it returns 0.
 */
function confirmUser($username, $password){
   global $conn;
   /* Add slashes if necessary (for query) */
   if(!get_magic_quotes_gpc()) {
	$username = addslashes($username);
   }

   /* Verify that user is in database */
   $q = "select password from user_account where username = '$username'";
   $result = mysql_query($q,$conn);
   if(!$result || (mysql_numrows($result) < 1)){
      return 1; //Indicates username failure
   }

   /* Retrieve password from result, strip slashes */
   $dbarray = mysql_fetch_array($result);
   $dbarray['password']  = stripslashes($dbarray['password']);
   $password = stripslashes($password);

   /* Validate that password is correct */
   if($password == $dbarray['password']){
      return 0; //Success! Username and password confirmed
   }
   else{
      return 2; //Indicates password failure
   }
}

/**
 * checkLogin - Checks if the user has already previously
 * logged in, and a session with the user has already been
 * established. Also checks to see if user has been remembered.
 * If so, the database is queried to make sure of the user's 
 * authenticity. Returns true if the user has logged in.
 */
function checkLogin(){
   /* Check if user has been remembered */
   if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass'])){
      $_SESSION['usernameremember'] = $_COOKIE['cookname'];
      $_SESSION['passwordremember'] = $_COOKIE['cookpass'];
   }

   /* Username and password have been set */
   if(isset($_SESSION['usernameremember']) && isset($_SESSION['passwordremember'])){
      /* Confirm that username and password are valid */
      if(confirmUser($_SESSION['usernameremember'], $_SESSION['passwordremember']) != 0){
         /* Variables are incorrect, user not logged in */
         unset($_SESSION['usernameremember']);
         unset($_SESSION['passwordremember']);
         return false;
      }
      return true;
   }
   /* User not logged in */
   else{
      return false;
   }
}

/**
 * Determines whether or not to display the login
 * form or to show the user that he is logged in
 * based on if the session variables are set.
 */
function displayLogin(){
   global $logged_in;
   if($logged_in){
     $query1  = "SELECT * FROM user_account  where username = '$_COOKIE[cookname]'";
	$result1 = mysql_query($query1) or die(mysql_error());
	
		$row = mysql_fetch_array($result1);
 			
			$id = $row['id'];
			$crypted = $row['crypt'];
			$username = $row['username'];
		 	$_SESSION['basic_is_logged_in'] = "$id";
			include_once('mem/random_char.php');
			$query = "update user_account set crypted = '$pwd' where id = '$id' limit 1";
			$result = mysql_query($query) or die(mysql_error()) ; 
			if ($row['user_type'] == '0')
			{
				$_SESSION['admin'] = 0;
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/community.php?crypted=$pwd'; </script> ";
			}
			else
				if ($row['user_type'] == '1')
			{
				$_SESSION['admin'] = 1;
				$date_set = date("D, jS F Y @ H:i:s");
				$query = "update user_account set last_logged_in = '$date_set' where id = '$id' limit 1";
				$result = mysql_query($query) or die(mysql_error()) ; 
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/admin.php?crypted=$pwd'; </script> ";
			}
			else
			{
				$_SESSION['admin'] = '0';
				
				$getmonth = date("m");
				$getyear = date("Y");
				$getdate = date("d");
				$numdays = date("t");
				$startmonth = "-$getmonth-$getyear";
				echo "<script type=text/javascript language=javascript> window.location.href = 'mem/booking.php?crypted=$pwd&page=all&date_sel_all=01$startmonth&date_sel_all_end=$numdays$startmonth&select=6&menu2=0&user_sel=0'; </script> ";
			
			}
			
		
		
	
   
   
   }
   else{
echo "<script type=text/javascript language=javascript> window.location.href = 'home.php?error=2'; </script> ";   }
}


/**
 * Checks to see if the user has submitted his
 * username and password through the login form,
 * if so, checks authenticity in database and
 * creates session.
 */
if(isset($_POST['sublogin'])){
   /* Check that all fields were typed in */
   if(!$_POST['szID'] || !$_POST['szPassword']){
      die('You didn\'t fill in a required field.');
   }
   /* Spruce up username, check length */
   $_POST['szID'] = trim($_POST['szID']);
   if(strlen($_POST['szID']) > 30){
      die("Sorry, the username is longer than 30 characters, please shorten it.");
   }

   /* Checks that username is in database and password is correct */
   $md5pass = $_POST['szPassword'];
   $result = confirmUser($_POST['szID'], $md5pass);

   /* Check error codes */
   if($result == 1){
      die('That username doesn\'t exist in our database.');
   }
   else if($result == 2){
      die('Incorrect password, please try again.');
   }

   /* Username and password correct, register session variables */
   $_POST['szID'] = stripslashes($_POST['szID']);
   $_SESSION['usernameremember'] = $_POST['szID'];
   $_SESSION['passwordremember'] = $_POST['szPassword'];

   /**
    * This is the cool part: the user has requested that we remember that
    * he's logged in, so we set two cookies. One to hold his username,
    * and one to hold his md5 encrypted password. We set them both to
    * expire in 100 days. Now, next time he comes to our site, we will
    * log him in automatically.
    */
   if(isset($_POST['remember'])){
      setcookie("cookname", $_SESSION['usernameremember'], time()+60*60*24*100, "/");
      setcookie("cookpass", $_SESSION['passwordremember'], time()+60*60*24*100, "/");
   }

   /* Quick self-redirect to avoid resending data on refresh */
   echo "<meta http-equiv=\"Refresh\" content=\"0;url=$HTTP_SERVER_VARS[PHP_SELF]\">";
   return;
}

/* Sets the value of the logged_in variable, which can be used in your code */
$logged_in = checkLogin();
displayLogin();
?>