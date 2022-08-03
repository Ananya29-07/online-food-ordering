<?php include('partials-frontend/menu-frontend.php'); ?>
<?php include('config/constants.php'); ?>
    <!-- Navbar Section Ends Here -->
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center" style="color: black;">Explore Foods</h2>
            <?php
               $sql="SELECT * FROM categories WHERE featured='Yes' AND active='Yes' LIMIT 3";
               $res=mysqli_query($conn,$sql);
               $count=mysqli_num_rows($res);
               if($count>0)
               {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                     <a href="category-foods.html">
                      <div class="box-3 float-container">
                        <?php
                          if($image_name=="")
                          {
                              echo "Image Not Available";
                          }
                          else
                          {
                            ?>
                              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                            <?php
                          }
                          ?>
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                       </div>
                     </a>
                    <?php
                  }
               }
               else
               {
                  echo "Categories not Added";
               }
            ?>  
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
                $sql2="SELECT * FROM food WHERE active='Yes'";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
                if($count2>0)
                {
                  while($row=mysqli_fetch_assoc($res2))
                  {
                     $id=$row['id'];
                     $title=$row['title'];
                     $description=$row['description'];
                     $price=$row['price'];
                     $image_name=$row['image_name'];
                     ?>
                       <div class="food-menu-box">
                         <div class="food-menu-img">
                         <?php
                          if($image_name=="")
                          {
                              echo "Image Not Available";
                          }
                          else
                          {
                            ?>
                              <img src="<?php echo SITEURL;?>/images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                            <?php
                          }
                          ?>
                         </div>
                         <div class="food-menu-desc">
                            <h4><?php echo $title ?></h4>
                            <p class="food-price">₹<?php echo $price ?></p>
                            <p class="food-detail"><?php echo $description; ?></p><br>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                         </div>
                       </div>
                     <?php
                  }
                }
                else
                {
                    echo "No Food Available";
                }
            ?>
            <div class="clearfix"></div>
        </div>
     </section>   
    <!-- fOOD Menu Section Ends Here -->
    <!-- social Section Starts Here -->
    <?php include('partials-frontend/footer-frontend.php'); ?>
    <!-- footer Section Ends Here -->
</body>
</html>