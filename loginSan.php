<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    $response = array();
    $response["success"] = false; 
    
    if ($_POST['username']!=""&&$_POST['password']!="") {
        $username = mysql_prep($_POST["username"]);
        $password = mysql_prep($_POST["password"]);

        $found_user = attempt_login($username, $password);

        if ($found_user) {
            $response["success"] = true;  
            $response["username"] = $found_user['username'];
            $response["name"] = $found_user['shopname'];
            $response["age"] = $found_user['gstNo'];
        }
    }

    echo json_encode($response);
?>