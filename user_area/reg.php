<?php
include('../include/db.php');
include('../functions/common_function.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-x1-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="username" class="form-label"><b>Username : </b></label>
                        <input type="text" id="username" class="form-control" placeholder="Enter your Username" required name="name"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="email" class="form-label"><b>Email : </b></label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your Email" required name="email"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="image" class="form-label"><b>User Image : </b></label>
                        <input type="file" id="image" class="form-control" required name="image"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label"><b>Password : </b></label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label"><b>Confirm Password : </b></label>
                        <input type="password" id="conf_password" class="form-control" placeholder="Enter your password" required name="conf_password"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="address" class="form-label"><b>Address : </b></label>
                        <input type="text" id="address" class="form-control" placeholder="Enter your Address" required name="address"/>
                    </div>
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="phone" class="form-label"><b>Phone number : </b></label>
                        <input type="text" id="phone" class="form-control" placeholder="Enter your phone number" required name="phone"/>
                    </div>
                    <div class="mb-4 w-50 m-auto">
                        <input  class="bg-info" type="submit" value="Register" name="Register">
                        <p class="fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"> Login</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['Register'])){
    
    $user=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $conf_password=$_POST['conf_password'];
    $phone=$_POST['phone'];
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    $ip=getIPAddress();

    global $con;
    $select_query="select * from  user where name='$user' or email='$email'";
    $r=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($r);
    if($rows_count>0){
        echo "<script>
        swal({
            title: 'Error',
            text: 'Username & Email already exists!',
            icon: 'error',
            button: 'OK',
        });
    </script>";}
    else if($password!=$conf_password){
        echo "<script>
        swal({
            title: 'Error',
            text: 'password not match',
            icon: 'error',
            button: 'OK',
        });
    </script>";
    }
    else{
        move_uploaded_file($image_tmp,"./user_img/$image");
        $insert_query="insert into user (name,email,password,address,ip,image,phone) values('$user','$email','$password','$ip','$address','$image','$phone')";
        $sql_execute=mysqli_query($con,$insert_query);
    }

   $select_cart="select * from cart where ip='$ip'";
   $r_cart=mysqli_query($con,$select_cart);
   $rows_count=mysqli_num_rows($r_cart);
   if($rows_count>0){
    $_SESSION['name']=$user;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('../checkout.php','_self')</script>";
   }else{
    echo "<script>window.open('../index.php','_self')</script>";
   }

    
}
?>