<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee Details</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
		
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
		
            $dbserver = 'localhost';
            $username = 'williamkyle'; 
            $password = 'temp'; // Replace with your password
            $dbname = 'williamkyle_prs';
            
            $conn = mysqli_connect($dbserver, $username, $password, $dbname);
            
            if (!$conn) {
                exit('DB Connection Failed!');
            }
         
            $stmt1 = mysqli_prepare(
                    $conn,
                    "SELECT product_id as pid, name, description 
                    FROM product 
                    WHERE product_id = ?");
            $product_id = $_GET['pid'];
            mysqli_stmt_bind_param($stmt1, "i", $product_id);
            mysqli_stmt_execute($stmt1);
            $result = mysqli_stmt_get_result($stmt1);
            while (($row = mysqli_fetch_assoc($result))) {
                echo '<p>' . $row["name"] 
                            . ' ' . $row["description"] 
                            . ' (' . $row["pid"] . ')'
                            . '</p>';
            }
        ?>
    </body>
</html>