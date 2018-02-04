<?php require_once('inc/top.php') ; ?>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper">
  <?php require_once('inc/header.php') ; ?>


        <div class="container-fluid body-section">
            <div class="row">
    <?php require_once('inc/sidebar.php') ; ?>

                <div class="col-md-9">
                    <h1><i class="fa fa-folder-open"></i> Categories <small>Different Categories</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                    </ol>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <form action="inc/process.php" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:*</label>
                                    <?php  
                                    if(isset($_GET['error'])) {echo "<span class='pull-right' style='color:red;'>".$_GET['error']."</span>" ;}
                                    
                                    else if(isset($_GET['success'])) {echo "<span class='pull-right' style='color:green;'>".$_GET['success']."</span>" ;}
                                    
                                    else{
                                        echo "<span class='pull-right'>All(*) fields are required</span>" ;
                                    }
                                    
                                    
                                    ?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="cat-name"  >
                                </div>
                                <input type="submit" value="Add Category" 
                                name="add-category" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-6"><br>
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category Name</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                  $query="select * from categories order by cat_id desc" ;
                                  $run=mysqli_query($conn,$query) ;
                                  if(mysqli_num_rows($run)>0){
                                      
                                   while($row=mysqli_fetch_array($run)){   
                                      $cat_id=$row['cat_id'] ;
                                      $cat_name=$row['cat_name'] ;   
                                    
                                        
                                ?>  
                                    
                                   <tr>
                                        <td><?php echo $cat_id  ; ?></td>
                                        <td><?php echo ucwords($cat_name)  ; ?></td>
                                        <td><a href="categories.php?edit=<?php echo $cat_id ; ?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="categories.php?del=<?php echo $cat_id ; ?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php
                                  }
                                  }
                                     else{
                                      echo "No category found" ;
                                  } 
                                      
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php require_once('inc/footer.php') ; ?>
