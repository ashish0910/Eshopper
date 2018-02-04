<?php

require_once('db.php') ;

//if(isset($_POST['add-category']))
//{
//    $cat_name = $_POST['cat-name'] ;
//    
//    if(empty($cat_name)){
//        header('../categories.php?error=Category Name Required') ;
//    }
//
//    else
//        
//    {
//        $query = "INSERT INTO 'categories' ('cat_name') VALUES ('$cat_name')" ;
//        $result=mysqli_query($conn,$query);
//        if($result){ 
//        header('location: ../categories.php?success=Category has been added') ;
//            echo "done" ;
//        }
//        else{
//        header('location: ../categories.php?error=This Category already added') ;          echo "some problem"  ;
//        }
//    }
//}

if(isset($_POST['add-category']))
{
  $cat_name=$_POST['cat-name'] ;
  
    if(empty($cat_name)){
        header('location: ../categories.php?error=category name required') ;
    }
    else{
        
        $query="INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')" ;
        if(mysqli_query($conn, $query)){
            header('location: ../categories.php?success=category has been added') ;
        }
        else{
            header('location: ../categories.php?error=this category already exist') ;
        } 
    
    
    
    }
    
    
    
}

?>