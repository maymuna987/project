

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-x1-6">
                <form action="" method="post" >
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="name" class="form-label"><b>Username : </b></label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your Username" required="required" name="name"/>
                    </div>
                   
                    <div class="form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label"><b>Password : </b></label>
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" required name="password"/>
                    </div>
                    
                    
                    <div class="mb-4 w-50 m-auto">
                        <input  class="bg-info" type="submit" value="Login",name="Login">
                        <p class="fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="reg.php" class="text-danger"> Register</a></p>
                    </div>
                    
                </form>
            </div>           
        </div>       
    </div>
</body>
</html>

<?php

if(isset($_POST['Login'])){
    $username=$_POST['name'];
    $userpass=$_POST['password'];
    echo $userpass;

} 

?>