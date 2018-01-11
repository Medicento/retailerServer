<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    $response = array();
    $response["success"] = false;

    if ($_POST['username']!=""&&$_POST['password']!=""&&$_POST['age']!=""&&$_POST['name']!="") {
        $username = mysql_prep($_POST['username']); 
        $name = mysql_prep($_POST['name']); 
        $hashed_password = password_encrypt($_POST['password']);
        $age = mysql_prep($_POST['age']);
        
        $query = "INSERT INTO users (username, shopname, hashed_password, gstNo)";
        $query .= " VALUES ('{$username}', '{$shopname}', '{$hashed_password}', '{$gstNo}')";
        $result = mysqli_query($conn, $query);
        confirm_query($result);

        if ($result) {
            $response["success"] = true;     
        }   
    }
    echo json_encode($response);
?>