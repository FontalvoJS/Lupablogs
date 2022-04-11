<?php
require '../modelo/conexion.php';
if (!isset($_GET['id'])) {
  header("Location: index.php");
  die();
} else {
  $id = $_GET['id'];
  $DB = new DB();
  $post = $DB->escogerPost($id);
  $post = $post[0];
  $titulo = $post['titulo'];
  $redaccion = $post['redaccion'];
  $descripcion = $post['descripcion'];
  $autor = $post['username'];
  $categoria = $post['categoria'];
  $imagen = $post['Imagen'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <title><?php echo $titulo; ?> | Lupa CB</title>
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

  <!-- ======= Header ======= -->
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
          <form id="formSearch" action="vistas/search-result.php" method="get" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" name="busqueda" class="form-control">
            <button class="btn js-search-close" onclick="document.getElementById('formSearch').submit();" type="submit"><span><i class="fas fa-arrow-right" style="font-size:14px;position:relative;bottom:5px;right:5px"></i></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
              <div class="post-meta"><span class="date"><?php echo $categoria ?></span> <span class="mx-1">&bullet;</span> <span><?php echo substr($post['fecha'], 0, -9) ?></span> <span class="mx-1">&bullet;</span><span><?php echo $autor  ?></span><span class="mx-1">&bullet;</span><span class="mx-1"><a href="editPost.php?id=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></span> </div>
              <h1 class="mb-5"><?php echo $titulo ?></h1>
              <img src="../assets/portadas_articulos/<?php echo $imagen; ?>" class="img-fluid" alt="imagen de portada">
              <hr style="margin-top:5%">
              <div style="font-size:18px;font-weight:500">
                <?php echo $redaccion; ?>
              </div>
            </div><!-- End Single Post Content -->

            <!-- ======= Comments ======= -->
            <div class="comments d-none">
              <h5 class="comment-title py-4">2 Comments</h5>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="../assets/img/person-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">Jordan Singer</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                  </div>

                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="../assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="../assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="../assets/img/person-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-shrink-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex">
                    <h6 class="me-2">Santiago Roberts</h6>
                    <span class="text-muted">4d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti dolorum, quas delectus nobis porro accusantium molestias sequi.
                  </div>
                </div>
              </div>
            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5 d-none">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>

                    <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Post comment">
                  </div>
                </div>
              </div>
            </div><!-- End Comments Form -->

          </div>
          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>

              </ul>

              <div class="tab-content" id="pills-tabContent" style="max-height:1000px;overflow:auto">

                <!-- Popular -->

                <?php
                $sql = "SELECT * FROM `posts` ORDER BY `posts`.`id` DESC LIMIT 5";
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
                <?php require '../component/categories_List.php' ?>

              </div>
            </div>

            <div class="aside-block d-none">
              <h3 class="aside-title">Video</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="../assets/imgs_articulos/<?php echo $imagen ?>" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->

           
            </div><!-- End Categories -->

            

          </div>
        </div>
      </div>
    </section>
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
              <li><a href="../index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="../index.php"><i class="bi bi-chevron-right"></i> Blog</a></li>
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
                    <span>Life Insurance And Pregnancy: A Working Mom’s Guide</span>
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
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/ajax.js"></script>

</body>

</html>