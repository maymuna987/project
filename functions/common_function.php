<?php
    // include('./include/db.php');


    function getproducts(){
      global $con;
      if(!isset($_GET['cat'])){
        $select_query="select * from products order by rand() LIMIT 0,12";
        $r=mysqli_query( $con ,$select_query);
        // $row=mysqli_fetch_assoc($r);
        // echo $row['pro_title'];
        while($row=mysqli_fetch_assoc($r)){
          $pro_id=$row['pro_id'];
          $pro_title=$row['pro_title'];
          $pro_des=$row['pro_des'];
          $pro_key=$row['pro_key'];
          $Cat_id=$row['Cat_id'];
          $price=$row['price'];
          $pro_img=$row['pro_img'];
          echo "<div class='col-md-4 mb-2 '>
          <div class='card'>
            <img src='./admin_area/pro_img/$pro_img' class='card-img-top' alt='$pro_title'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'> $pro_des</p>
                <p class='card-text'>Price : $price </p>
                <a href='index.php?cart=$pro_id' class='btn btn-info' >Add to Cart</a>
                <a href='view_similar_pro.php?cat=$Cat_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
        }
    }
  }
//getting all products
function get_all_pro(){
  global $con;
      if(!isset($_GET['cat'])){
        $select_query="select * from products order by rand()";
        $r=mysqli_query( $con ,$select_query);
        // $row=mysqli_fetch_assoc($r);
        // echo $row['pro_title'];
        while($row=mysqli_fetch_assoc($r)){
          $pro_id=$row['pro_id'];
          $pro_title=$row['pro_title'];
          $pro_des=$row['pro_des'];
          $pro_key=$row['pro_key'];
          $Cat_id=$row['Cat_id'];
          $price=$row['price'];
          $pro_img=$row['pro_img'];
          echo "<div class='col-md-4 mb-2 '>
          <div class='card'>
            <img src='./admin_area/pro_img/$pro_img' class='card-img-top' alt='$pro_title'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'> $pro_des</p>
                <p class='card-text'>Price : $price </p>
                <a href='index.php?cart=$pro_id' class='btn btn-info' >Add to Cart</a>
                <a href='view_similar_pro.php?cat=$Cat_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
        }
    }
}



  function get_unique_cat(){
    global $con;
    if(isset($_GET['cat'])){
      $Cat_id=$_GET['cat'];
      $select_query="select * from products where Cat_id=$Cat_id";
      $r=mysqli_query( $con ,$select_query);
      $num_of_rows=mysqli_num_rows($r);
      if($num_of_rows==0){
        echo "<h1 class='text-center'>No stock for this category</h1>";
      }
      
      while($row=mysqli_fetch_assoc($r)){
        $pro_id=$row['pro_id'];
        $pro_title=$row['pro_title'];
        $pro_des=$row['pro_des'];
        $pro_key=$row['pro_key'];
        $Cat_id=$row['Cat_id'];
        $price=$row['price'];
        $pro_img=$row['pro_img'];
        echo "<div class='col-md-4 mb-2 '>
          <div class='card'>
            <img src='./admin_area/pro_img/$pro_img' class='card-img-top' alt='$pro_title'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'> $pro_des</p>
                <p class='card-text'>Price : $price </p>
                <a href='index.php?cart=$pro_id' class='btn btn-info' >Add to Cart</a>
                <a href='view_similar_pro.php?cat=$Cat_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
      }
  }
}


function get_unique(){
  global $con;
  if(isset($_GET['cat'])){
    $Cat_id=$_GET['cat'];
    $select_query="select * from products where Cat_id=$Cat_id";
    $r=mysqli_query( $con ,$select_query);
    $num_of_rows=mysqli_num_rows($r);
    if($num_of_rows==0){
      echo "<h1 class='text-center'>No stock for this category</h1>";
    }
    
    while($row=mysqli_fetch_assoc($r)){
      $pro_id=$row['pro_id'];
      $pro_title=$row['pro_title'];
      $pro_des=$row['pro_des'];
      $pro_key=$row['pro_key'];
      $Cat_id=$row['Cat_id'];
      $price=$row['price'];
      $pro_img=$row['pro_img'];
      echo "<div class='col-md-4 mb-2 '>
        <div class='card'>
          <img src='./admin_area/pro_img/$pro_img' class='card-img-top' alt='$pro_title'>
          <div class='card-body'>
            <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'> $pro_des</p>
              <p class='card-text'>Price : $price </p>
              <a href='index.php?cart=$pro_id' class='btn btn-info' >Add to Cart</a>
          </div>
        </div>
      </div>";
    }
}
}

    function getcategory(){
      $select_Category="select * from category";
      global $con;
      $rs=mysqli_query($con,$select_Category);
      while($row_data=mysqli_fetch_assoc($rs)){
          $cat_title=$row_data['Cat_title'];
          $cat_id=$row_data['Cat_id'];
          echo  "<li class='nav-item mb-3'>
          <a href='index.php?cat=$cat_id' class='nav-link text-black '><h4>$cat_title</h4></a>
        </li>";
      }    
    }

    //searching products
    function search_pro(){
      global $con;
      if(isset($_GET['search_data_pro'])){
        $search=$_GET['search_data'];
      $search_query="select * from products where pro_key like '%$search%' ";
      $r=mysqli_query( $con ,$search_query);
      $num_of_rows=mysqli_num_rows($r);
      if($num_of_rows==0){
        echo "<h2 class='text-center'>No Result matched </h2>";
      }
      
        while($row=mysqli_fetch_assoc($r)){
          $pro_id=$row['pro_id'];
          $pro_title=$row['pro_title'];
          $pro_des=$row['pro_des'];
          $pro_key=$row['pro_key'];
          $Cat_id=$row['Cat_id'];
          $price=$row['price'];
          $pro_img=$row['pro_img'];
          echo "<div class='col-md-4 mb-2 '>
          <div class='card'>
            <img src='./admin_area/pro_img/$pro_img' class='card-img-top' alt='$pro_title'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'> $pro_des</p>
                <p class='card-text'>Price : $price </p>
                <a href='index.php?cart=$pro_id' class='btn btn-info' >Add to Cart</a>
                <a href='view_similar_pro.php?cat=$Cat_id' class='btn btn-secondary'>View more</a>
            </div>
          </div>
        </div>";
        }
    }
  }

   //get ip
  
  function getIPAddress() {  
    
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }     
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else{  
          $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

    
//cart function

    function cart(){
      if(isset($_GET['cart'])){
        global $con;
        $ip=getIPAddress();
        $get_pro_id=$_GET['cart'];
        $select_query="select * from cart where pro_id=$get_pro_id and ip='$ip'";
        $r=mysqli_query( $con ,$select_query);
        $num_of_rows=mysqli_num_rows($r);
        if($num_of_rows>0){
          echo "<script>alert('This item is already present inside the cart ') </script>";
          echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into cart (pro_id,ip,quantity) values ($get_pro_id,'$ip',0)";
            $r=mysqli_query( $con ,$insert_query);
            echo "<script>alert('item is inserted to the cart ') </script>";
            echo "<script>window.open('index.php','_self')</script>";
          }       
      }
    }

   

    //cart number
    function cart_no(){
      if(isset($_GET['cart'])){
        global $con;
        $ip=getIPAddress();
        $select_query="select * from cart where ip='$ip'";
        $r=mysqli_query( $con ,$select_query);
        $rows=mysqli_num_rows($r);   
        }else{
          global $con;
        $ip=getIPAddress();
        $select_query="select * from cart where ip='$ip'";
        $r=mysqli_query( $con ,$select_query);
        $rows=mysqli_num_rows($r);   
          }  
          echo $rows;   
      }

    //total price
      function total_price(){
        global $con;
        $ip=getIPAddress();
        $total=0;
        $cart_query="select * from cart where ip= '$ip' ";
        $r=mysqli_query($con , $cart_query);
        while($row=mysqli_fetch_array($r)){
          $pro_id=$row['pro_id'];
          $select_pro="select * from products where pro_id=$pro_id";
          $r_pro=mysqli_query($con , $select_pro);
          while($row_pro=mysqli_fetch_array($r_pro)){
            $pro_pri=array($row_pro['price']);
            $pro_values=array_sum($pro_pri);
            $total+=$pro_values;
          }
        }
        echo $total;
      }
    
?>