<?php
include('../admin_area/header.php');
include('../include/db.php');

if (isset($_POST['insert_product'])) {
    $pro_title = $_POST['pro_title'];
    $description = $_POST['description'];
    $Keyword = $_POST['Keyword'];
    $Product_category = $_POST['Product_category'];
    $product_Price = $_POST['product_Price'];
    $status = 'true';
    
    // Access image
    $Product_image = $_FILES['Product_image']['name'];
    $temp_image = $_FILES['Product_image']['tmp_name']; 

    if ($pro_title == '' || $description == '' || $Keyword == '' || $Product_category == '' || $product_Price == '' || $Product_image == '') {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
    
        move_uploaded_file($temp_image, "./pro_img/$Product_image");
    }

    $insert_products = "INSERT INTO products (pro_title, pro_des, pro_key, Cat_id, pro_img, price, date, status) 
                        VALUES ('$pro_title', '$description', '$Keyword', $Product_category, '$Product_image', '$product_Price', NOW(), '$status')";
    
    $r = mysqli_query($con, $insert_products);
    if ($r) {
        echo "<script>alert('Successfully inserted the product')</script>";
    } else {
        echo "<script>alert('Error inserting the product')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert-Product</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body class="bg-light">
    <div class="container mt-4 w-50 m-auto">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pro_title" class="form-label"><b>Product Title:</b></label>
                <input type="text" name="pro_title" id="pro_title" class="form-control" placeholder="Enter Product Title" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label"><b>Product Description:</b></label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Keyword" class="form-label"><b>Product Keyword:</b></label>
                <input type="text" name="Keyword" id="Keyword" class="form-control" placeholder="Enter Product Keywords" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="Product_category" id="Product_category" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php
                        $select_query = "SELECT * FROM category";
                        $rs = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($rs)) {
                            $category_title = $row['Cat_title'];
                            $cat_id = $row['Cat_id'];
                            echo "<option value='$cat_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_image" class="form-label"><b>Product Image:</b></label>
                <input type="file" name="Product_image" id="Product_image" class="form-control" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Price" class="form-label"><b>Product Price:</b></label>
                <input type="text" name="product_Price" id="product_Price" class="form-control" placeholder="Enter Product Price" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    include('../admin_area/footer.php');
?>
