<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    $response = array();
    $response["success"] = false;

    if ($_POST['username']!=""&&$_POST['shopname']!=""&&$_POST['password']!=""&&$_POST['gstNo']!=""&&$_POST['dlNo']!=""&&$_POST['phno']!=""&&$_POST['owner']!="") {
        $username = mysql_prep($_POST['username']); 
        $shopname = mysql_prep($_POST['shopname']); 
        $hashed_password = password_encrypt($_POST['password']);
        $gstNo = mysql_prep($_POST['gstNo']);
        $dlNo = mysql_prep($_POST['dlNo']);
        $phno = mysql_prep($_POST['phno']);
        $owner = mysql_prep($_POST['owner']);
        
        $query = "INSERT INTO users (username, shopname, hashed_password, gstNo, dlNo, phno, owner)";
        $query .= " VALUES ('{$username}', '{$shopname}', '{$hashed_password}', '{$gstNo}', '{$dlNo}', '{$phno}', '{$owner}')";
        $result = mysqli_query($conn, $query);
        confirm_query($result);

        if ($result) {
            $response["success"] = true;     
        }   
    }
    echo json_encode($response);
?>