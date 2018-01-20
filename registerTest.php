<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    $response = array();
    $response["success"] = false;

    if ($_POST['username']!=""&&$_POST['name']!=""&&$_POST['password']!=""&&$_POST['phno']!="") {
        $username = mysql_prep($_POST['username']); 
        $shopname = mysql_prep($_POST['name']); 
        $hashed_password = password_encrypt($_POST['password']);
        $phno = mysql_prep($_POST['phno']);
        
        $query = "INSERT INTO users (username, shopname, hashed_password, phno)";
        $query .= " VALUES ('{$username}', '{$shopname}', '{$hashed_password}', '{$phno}')";
        $result = mysqli_query($conn, $query);
        confirm_query($result);

        if ($result) {
            $response["success"] = true;     
        }   
    }
    echo json_encode($response);
?>