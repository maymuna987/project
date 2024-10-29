
<?php
include('../admin_area/header.php');
include('../include/db.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    $select_query="select * from category where cat_title = '$category_title'";
    $rs=mysqli_query($con,$select_query);
    $n=mysqli_num_rows($rs);
    if($n>0){
        echo "<script>alert('This Category is already present in the database')</script>";
    }else{
        $insert_query="insert into category (Cat_title) values ('$category_title')";
        $r=mysqli_query($con,$insert_query);
        if($r){
            echo "<script>alert('Category has been inserted succcessfully')</script>";
        }
    }
} 

?>
<body  class="bg-light">
    <div class=" container mt-3 w-50 m-auto ">
        <h1 class="text-center">Insert Category</h1>
        <form action="" method="post">
        <div class="form-outline mb-4">
            <label for="cat_title" class="form-label"><b>Category Title:</b></label>
            <input type="text" name="cat_title" id="cat_title" class="form-control" placeholder="Enter Category Title">
        </div>
        <div class="input-group w-60 mb-2 m-auto">
            <input type="submit" class="bg-info border-0 p-2 my-3 mb-3 px-3" name="insert_cat" value="Insert Category">
        </div>   
        </form>
    </div>

</body>   
    
    

<?php 
    include('../admin_area/footer.php');

