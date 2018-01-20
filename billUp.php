<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>

<?php
    $response = array();
    $response["success"] = false;

    if ($_POST['consumer']!=""&&$_POST['phno']!=""&&$_POST['doc']!=""&&$_POST['product']!=""&&$_POST['qty']!=""&&$_POST['bno']!=""&&$_POST['expDate']!=""&&$_POST['mrp']!=""&&$_POST['discount']!=""&&$_POST['orderId']!=""&&$_POST['userId']!="") {
        $consumer = mysql_prep($_POST['consumer']); 
        $phno = mysql_prep($_POST['phno']); 
        $doc = mysql_prep($_POST['doc']);
        $product = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product']));
        $qty = mysql_prep($_POST['qty']);
        $bno = mysql_prep($_POST['bno']);
        $expDate = mysql_prep($_POST['expDate']);
        $mrp = mysql_prep($_POST['mrp']);
        $discount = mysql_prep($_POST['dicount']);
        $orderId = mysql_prep($_POST['orderId']);
        $userId = mysql_prep($_POST['userId']);
        date_default_timezone_set('Asia/Calcutta');
        $timeOfOrder = date("d-m-Y");
        
        $query = "INSERT INTO bills (consumer, phno, doc, product, qty, bno, expDate, mrp, discount, orderId, userId, timeOfOrder)";
        $query .= " VALUES ('{$consumer}', '{$phno}', '{$doc}', '{$product}', '{$qty}', '{$bno}', '{$expDate}', '{$mrp}', '{$discount}', '{$orderId}', '{$userId}', '{$timeOfOrder}')";
        $result = mysqli_query($conn, $query);
        confirm_query($result);

        if ($result) {
            $response["success"] = true;     
        }   
    }
    echo json_encode($response);
?>