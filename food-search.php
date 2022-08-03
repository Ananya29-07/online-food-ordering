<?php include('partials-frontend/menu-frontend.php'); ?>
<?php include('config/constants.php'); ?>
    <!-- Navbar Section Ends Here -->
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
                $search=$_POST['search'];
            ?>
            <h2 style="color: black;">Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
              $search=$_POST['search'];
              $sql="SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res);
              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res))
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
                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                            <?php
                          }
                          ?>
                       </div>
                       <div class="food-menu-desc">
                          <h4><?php echo $title; ?></h4>
                          <p class="food-price">₹<?php echo $price; ?></p>
                          <p class="food-detail"><?php echo $description; ?></p><br>
                          <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                       </div>
                     </div>
                    <?php
                }
              }
              else
              {
                echo "<h4 class='text-center' style='color: white;'>Food not Available<h4>";
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