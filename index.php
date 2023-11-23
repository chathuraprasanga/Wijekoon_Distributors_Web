
<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="main-css/main/mainstyle.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="resources/images/logo1.png">

</head>

<body>

   <!--Header start-->

   <?php include 'includes/header.php'; ?>

    <!--Header end-->

   <!--content start-->

   <!--slider starts-->

   <section class="home">

      <div class="swiper home-slider">
   
         <div class="swiper-wrapper">
   
            <div class="swiper-slide slide" style="background:url(resources/images/Keshara\ 2.jpg) no-repeat">
               <div class="content">
                  <span>Wijekoon Distributors</span>
                  <h3>distributing arround the north-west</h3>
                  <a href="pages/aboutus/aboutus.php" class="btn">about us</a>
               </div>
            </div>
   
            <div class="swiper-slide slide" style="background:url(resources/images/home-slide-6.jpg) no-repeat">
               <div class="content">
                  <span>excellent quality</span>
                  <h3>discover the new products</h3>
                  <a href="pages/products/products.php" class="btn">products</a>
               </div>
            </div>
   
            <div class="swiper-slide slide" style="background:url(resources/images/home-slide-5.jpg) no-repeat">
               <div class="content">
                  <span>excellent quality</span>
                  <h3>have many products agriculture also</h3>
                  <a href="pages/products/products.php" class="btn">products</a>
               </div>
            </div>
            
         </div>
   
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
   
      </div>
   
   </section>

   <!--slider end-->

   <!--information starts-->

   <section class="content">

      <div class="image">
         <img src="resources\images\Keshara 3.jpg" alt="Wijekoon distributors">
      </div>
   
      <div class="content">
         <h3>Wijekoon Distributors</h3>
         <p>Wijekoon distributors is a medium scale company which distributing products of Keshara minerals and chemical (PVT)ltd. Since 2000. The company is distributing the products in north western province.  </p>
         <a href="pages/aboutus/aboutus.php" class="btn">read more</a>
      </div>
   </section>

   <section class="content">
      <div class="content">
         <h3>Keshara Minerals and Chemicals</h3>
         <p>Keshara  Minerals & Chemicals Kandy is a leading Minerals & Chemicals Manufacturers in Kandy, started 1994 as a small business, Today the company owns 5 large factories. Manufactures limestone related products</p>
         <a href="pages/aboutus/aboutus.php" class="btn">read more</a>
      </div>
      <div class="image">
         <img src="resources/images/Keshara.jpg" alt="Keshara Minerals and Chemicals">
      </div>
   </section>

   <!--information end-->

   <!--products section starts-->

   <section class="products">

      <h1 class="heading-title"> our products </h1>
   
      <div class="box-container">
   
         <div class="box">
            <div class="image">
               <img src="resources/images/product1.jpg" alt="">
            </div>
            <div class="content">
               <h3>Keshara Super lime</h3>
               <p>scale remover from surfaces that are prone to heavy buildup of scales.</p>
               <a href="pages/products/products.php" class="btn">order now</a>
            </div>
         </div>
   
         <div class="box">
            <div class="image">
               <img src="resources/images/product2.jpg" alt="">
            </div>
            <div class="content">
               <h3>Keshara Skim coat</h3>
               <p>to fill in cracks and holes in walls and prepare an even wall surface before applying paint.</p>
               <a href="pages/products/products.php" class="btn">order now</a>
            </div>
         </div>
         
         <div class="box">
            <div class="image">
               <img src="resources/images/product3.jpg" alt="">
            </div>
            <div class="content">
               <h3>Keshara Tile Master</h3>
               <p>Tile adhesives are used for fixing tiles on the walls, floors, swimming pools.</p>
               <a href="pages/products/products.php" class="btn">order now</a>
            </div>
         </div>
   
      </div>
   
      <div class="load-more"> <a href="pages/products/products.php" class="btn">load more</a> </div>
   
   </section>

   <!--products section ends-->

   <!--content end-->

   <!--Footer start-->

   <?php include 'includes/footer.php'; ?>

   <!--Footer end-->
   
   <!--javascript starts-->

   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
   <script src="script/script.js"></script>

   <script>
      
   </script>

   <!--javascript ends-->

</body>
</html>
