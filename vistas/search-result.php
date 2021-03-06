<?php
require '../modelo/conexion.php';
if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Search articles | Lupa CB</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Favicons -->
    <link rel="icon" href="https://lupajuridica.co/wp-content/uploads/2020/07/favicon.ico" sizes="32x32" />
    <link rel="icon" href="https://lupajuridica.co/wp-content/uploads/2020/07/favicon.ico" sizes="192x192" />
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="../assets/css/variables.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: ZenBlog - v1.0.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="../index.php" class="logo d-flex align-items-center">
          <img class="navbar-brand" src="https://lupajuridica.co//wp-content/uploads/2020/07/logo_2-1.png" alt="logo">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="../assets/img/logo.png" alt=""> -->
          <small style="color:#ed3838;font-weight:500">Community Blogger</small>



        </a>


        <nav id="navbar" class="navbar">
          <ul>
            <?php
            session_start();
            if (isset($_COOKIE['active']) && $_SESSION['username']) {
            ?>
              <li class="nav-item"><a href="../index.php">Home</a></li>

              <?php require '../component/botonPerfil.php' ?>

            <?php
            } else {

            ?>
              <?php
              require '../component/modalLogin.php';
              require '../component/modalRegistro.php';
              ?>
              <li class="nav-item"><a href="../index.php">Home</a></li>
              <li class="nav-item"><a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#Login">Log in</a></li>
            <?php
            } ?>

            <li class="dropdown"><a><span style="cursor:pointer">Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="../vistas/category.php?categoria=Global">Global</a></li>
                <li><a href="../vistas/category.php?categoria=Politics">Politics</a></li>
                <li><a href="../vistas/category.php?categoria=War">Wars</a></li>
                <li><a href="../vistas/category.php?categoria=Healths">Healths</a></li>
                <li><a href="../vistas/category.php?categoria=Covid19">Covid 19</a></li>
              </ul>
            </li>


            <li><a href="http://localhost/Lupablogs/contact.php">Contact</a></li>
          </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">


          <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
          <i class="bi bi-list mobile-nav-toggle"></i>

          <!-- ======= Search Form ======= -->
          <div class="search-form-wrap js-search-form-wrap">
            <form id="formSearch" action="../vistas/search-result.php" method="get" class="search-form">
              <span class="icon bi-search"></span>
              <input type="text" placeholder="Search" name="busqueda" class="form-control">
              <button class="btn js-search-close" onclick="document.getElementById('formSearch').submit();" type="submit"><span><i class="fas fa-arrow-right" style="font-size:14px;position:relative;bottom:5px;right:5px"></i></span></button>
            </form>
          </div><!-- End Search Form -->

        </div>

      </div>

    </header><!-- End Header -->

    <main id="main">

      <!-- ======= Search Results ======= -->
      <section id="search-result" class="search-result">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <h3 class="category-title">Search Results</h3>
              <?php
              $DB = new DB();
              $busqueda = $_GET['busqueda'];
              $sql = "SELECT * FROM `posts` WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' ORDER BY id DESC";
              $resultado = $DB->consulta($sql);
              if ($resultado) {
                for ($i = 0; $i < count($resultado); $i++) {
              ?>
                  <div class="d-md-flex post-entry-2 small-img">
                    <a href="article.php?id=<?php echo $resultado[$i]['id']; ?>" class="me-4 thumbnail">
                      <img src="http://localhost/Lupablogs/assets/portadas_articulos/<?php echo $resultado[$i]['Imagen'] ?>" alt="" class="img-fluid">
                    </a>
                    <div>
                      <div class="post-meta"><span class="date"><?php echo $resultado[$i]['categoria']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo substr($resultado[$i]['fecha'], 0, -9); ?></span></div>
                      <h3><a href="article.php?id=<?php echo $resultado[$i]['id']; ?>"><?php echo $resultado[$i]['titulo']; ?></a></h3>
                      <p><?php echo $resultado[$i]['descripcion']; ?></p>
                      <div class="d-flex align-items-center author">
                        <div class="name">
                          <h3 class="m-0 p-0"><?php echo $resultado[$i]['username']; ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                  $i++;
                }
              } else {
                ?>
                <div class="d-md-flex post-entry-2 small-img">
                  <div>
                    <div class="post-meta"><span class="date">No se encontraron resultados</span> <span></span></div>
                    <h3><a href="article.php?id="></a></h3>
                    <div class="d-flex align-items-center author">
                      <div class="name">
                        <h3 class="m-0 p-0"></h3>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>


              <!-- Paging -->
              <div class="text-start py-4">
                <div class="custom-pagination">
                  <a href="#" class="prev">Prevous</a>
                  <a href="#" class="active">1</a>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">4</a>
                  <a href="#">5</a>
                  <a href="#" class="next">Next</a>
                </div>
              </div><!-- End Paging -->

            </div>

            <div class="col-md-3">
              <!-- ======= Sidebar ======= -->
              <div class="aside-block">

                <div class="tab-content" id="pills-tabContent" style="max-height:1000px;overflow:auto">

                  <!-- Popular -->

                  <?php
                  $DB = new DB();
                  $sql = "SELECT * FROM `posts` ORDER BY `posts`.`id` DESC";
                  $consulta = $DB->consulta($sql);

                  for ($i = 0; $i < count($consulta); $i++) {

                  ?>

                    <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                      <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date"><?php echo substr($consulta[$i]['fecha'], 0, -9); ?></span></div>
                        <h2 class="mb-2"><a href="article.php?id=<?php echo $consulta[$i]['id'] ?>"><?php echo $consulta[$i]['titulo']; ?></a></h2>
                        <span class="author mb-3 d-block"><?php echo $consulta[$i]['username'] ?></span>
                      </div>

                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>

              <div class="aside-block d-none">
                <h3 class="aside-title">Video</h3>
                <div class="video-post">
                  <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                    <span class="bi-play-fill"></span>
                    <img src="../assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                  </a>
                </div>
              </div><!-- End Video -->

              <?php require '../component/categories_List.php' ?>

              <div class="aside-block">
                <h3 class="aside-title">Tags</h3>
                <ul class="aside-tags list-unstyled">
                  <li><a href="category.html">Business</a></li>
                  <li><a href="category.html">Culture</a></li>
                  <li><a href="category.html">Sport</a></li>
                  <li><a href="category.html">Food</a></li>
                  <li><a href="category.html">Politics</a></li>
                  <li><a href="category.html">Celebrity</a></li>
                  <li><a href="category.html">Startups</a></li>
                  <li><a href="category.html">Travel</a></li>
                </ul>
              </div><!-- End Tags -->

            </div>

          </div>
        </div>
      </section> <!-- End Search Result -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="footer-content">
        <div class="container">

          <div class="row g-5">
            <div class="col-lg-4">
              <h3 class="footer-heading">About ZenBlog</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
              <p><a href="about.html" class="footer-link-more">Learn More</a></p>
            </div>
            <div class="col-6 col-lg-2">
              <h3 class="footer-heading">Navigation</h3>
              <ul class="footer-links list-unstyled">
                <li><a href="index.html"><i class="bi bi-chevron-right"></i> Home</a></li>
                <li><a href="index.html"><i class="bi bi-chevron-right"></i> Blog</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Categories</a></li>
                <li><a href="single-post.html"><i class="bi bi-chevron-right"></i> Single Post</a></li>
                <li><a href="about.html"><i class="bi bi-chevron-right"></i> About us</a></li>
                <li><a href="http://localhost/Lupablogs/contact.php"><i class="bi bi-chevron-right"></i> Contact</a></li>
              </ul>
            </div>
            <div class="col-6 col-lg-2">
              <h3 class="footer-heading">Categories</h3>
              <ul class="footer-links list-unstyled">
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
                <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>

              </ul>
            </div>

            <div class="col-lg-4">
              <h3 class="footer-heading">Recent Posts</h3>

              <ul class="footer-links footer-blog-entry list-unstyled">
                <li>
                  <a href="single-post.html" class="d-flex align-items-center">
                    <img src="../assets/img/post-sq-1.jpg" alt="" class="img-fluid me-3">
                    <div>
                      <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                      <span>5 Great Startup Tips for Female Founders</span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="single-post.html" class="d-flex align-items-center">
                    <img src="../assets/img/post-sq-2.jpg" alt="" class="img-fluid me-3">
                    <div>
                      <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                      <span>What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="single-post.html" class="d-flex align-items-center">
                    <img src="../assets/img/post-sq-3.jpg" alt="" class="img-fluid me-3">
                    <div>
                      <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                      <span>Life Insurance And Pregnancy: A Working Mom???s Guide</span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="single-post.html" class="d-flex align-items-center">
                    <img src="../assets/img/post-sq-4.jpg" alt="" class="img-fluid me-3">
                    <div>
                      <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                      <span>How to Avoid Distraction and Stay Focused During Video Calls?</span>
                    </div>
                  </a>
                </li>

              </ul>

            </div>
          </div>
        </div>
      </div>

      <div class="footer-legal">
        <div class="container">

          <div class="row justify-content-between">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              <div class="copyright">
                ?? Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>

            <div class="col-md-6">
              <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>

            </div>

          </div>

        </div>
      </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>
  
  </body>

  </html>
<?php
} else {
  header("Location: ../index.php");
}
?>