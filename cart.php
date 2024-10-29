<?php 
include('include/db.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!----font awesome---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--navbar-->
<div class="container-fluid p=0">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(250, 236, 239);">
    <div class="container-fluid">
        <img src="./images/logo.jpeg" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-6 mb-lg-2 ms-3">
                <li class="nav-item mx-3">
                    <a class="nav-link active fs-4" aria-current="page" href="index.php">Home</a> 
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link fs-4" href="display_all_pro.php">Products</a> 
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link fs-4" href="user_area/reg.php">Register</a> 
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link fs-4" href="#">Contact</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link fs-4" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_no();?></sup></a>   
                </li>      
            </ul>
            <form class="d-flex ms-3" action="search_pro.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-secondary" name="search_data_pro">
            </form>
        </div>
    </div>
</nav>

<?php cart(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <ul class="navbar-nav me-auto">
        <li class="nav-item ms-3">
            <a class="nav-link text-light fs-4" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item ms-3">
            <a class="nav-link text-light fs-4" href="user_area/login.php">Login</a>
        </li>
    </ul>
</nav>

<div class="bg-light py-3">
    <h3 class="text-center">Welcome to E-Shop </h3>
</div>

<div class="container">
    <div class="row">
        <form action="" method="post">
            <table class="table table-bordered text-center">
                <?php
                global $con;
                $ip = getIPAddress();
                $total = 0;
                $cart_query = "SELECT * FROM cart WHERE ip = '$ip'";
                $r = mysqli_query($con, $cart_query);
                $r_count = mysqli_num_rows($r);

                if ($r_count > 0) {
                    echo "
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>";

                    while ($row = mysqli_fetch_array($r)) {
                        $pro_id = $row['pro_id'];
                        $select_pro = "SELECT * FROM products WHERE pro_id = $pro_id";
                        $r_pro = mysqli_query($con, $select_pro);

                        while ($row_pro = mysqli_fetch_array($r_pro)) {
                            $price_table = floatval($row_pro['price']);
                            $pro_title = $row_pro['pro_title'];
                            $pro_img = $row_pro['pro_img'];
                            $quantity = isset($row['quantity']) ? intval($row['quantity']) : 1;
                            $item_total = $price_table * $quantity;
                            $total += $item_total;
                ?>
                    <tr>
                        <td><?php echo $pro_title; ?></td>
                        <td><img src="./admin_area/pro_img/<?php echo $pro_img; ?>" alt="" style="width: 150px; height: 150px;"></td>
                        <td><input type="text" name="qty[<?php echo $pro_id; ?>]" value="<?php echo $quantity; ?>" class="form-input w-50"></td>
                        <td><?php echo $price_table; ?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $pro_id; ?>"></td>
                    </tr>
                <?php
                        }
                    }
                    echo "</tbody>";
                } else {
                    echo "<h2 class='text-center'>Cart is Empty</h2>";
                }
                ?>
            </table>
            <div class="d-flex justify-content-end">
                <?php
                if ($r_count > 0) {
                    echo "<input type='submit' value='Update' class='text-light bg-secondary px-3 py-2 border-0 mx-3' name='update'>
                          <input type='submit' value='Remove' class='text-light bg-secondary px-3 py-2 border-0 mx-3' name='Remove'>";
                }
                ?>
            </div>

            <div class="d-flex mb-5 py-4">
                <?php
                if ($r_count > 0) {
                    echo "<h4 class='px-3'>Subtotal: <strong>$total/-</strong></h4>
                          <input type='submit' value='Continue Shopping' class='text-light bg-secondary px-3 py-2 border-0 mx-3' name='Continue_Shopping'>
                          <button class='text-bright bg-secondary px-3 py-2 border-0'><a href='checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                } else {
                    echo "<input type='submit' value='Continue Shopping' class=' bg-secondary px-3 py-2 border-0 mx-3' name='Continue_Shopping'>";
                }

                if (isset($_POST['Continue_Shopping'])) {
                    echo "<script>window.open('index.php', '_self')</script>";
                }

                if (isset($_POST['update'])) {
                    foreach ($_POST['qty'] as $pro_id => $qty) {
                        $quantity = intval($qty);
                        $update_qty_query = "UPDATE cart SET quantity = $quantity WHERE ip = '$ip' AND pro_id = $pro_id";
                        mysqli_query($con, $update_qty_query);
                    }
                    echo "<script>window.open('cart.php', '_self')</script>";
                }
                ?>
            </div>
        </form>
    </div>
</div>

<?php
function rem_item(){
    global $con;
    if (isset($_POST['Remove'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
            $delete_query = "DELETE FROM cart WHERE pro_id = $remove_id";
            $run = mysqli_query($con, $delete_query);
            if ($run) {
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }
}

rem_item();
?>

<div class="bg-secondary p-3 text-center navbar-light text-light footer">
    <p>All rights reserved & Designed by <b>MAYMUNA MARJAN</b></p>
</div>

<!-- JavaScript -->
