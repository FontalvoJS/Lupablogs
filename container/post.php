<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Post articles | Lupa CB</title>
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
    <!-- Google Jquery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



</head>

<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="../index.php" class="logo d-flex align-items-center">
                <img class="navbar-brand" src="https://lupajuridica.co//wp-content/uploads/2020/07/logo_2-1.png" alt="logo">
                <small style="color:#ed3838;font-weight:500">Community Blogger</small>



            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>

                    <?php require '../component/botonPerfil.php' ?>
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

    <div class="container mb-5" style="margin-top:15%">
        <div class="row">
            <div class="col-12">
                <hr>
                <h1>Create new post</h1>
                <hr class="mb-5">
            </div>
        </div>
        <div class="row">
            <form id="createPost" enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                    <div class="form-group">
                        <small id="helpId" class="text-muted">Title</small>
                        <input type="text" name="titulo" id="" class="form-control" placeholder="">
                    </div>

                </div>
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 mb-3">
                    <div class="form-group">
                        <small id="helpId" class="text-muted">Description</small>
                        <input type="text" name="descripcion" id="" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <small id="helpId" class="text-muted">Categories</small>
                            <select name="categoria" class="form-select">
                                <option value="Healths" selected>Healths</option>
                                <option value="Politics">Politics</option>
                                <option value="War">War</option>
                                <option value="Global">Global</option>
                                <option value="Covid19">Covid 19</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 mb-3">
                        <div class="form-group">
                            <small id="helpId" class="text-muted">Portada</small>
                            <input type="file" name="imagen" id="" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12">
                    <div class="form-group mt-4">
                        <small id="helpId" class="text-muted">Redact</small>
                        <textarea name="redaccion" id="summernote" class="form-textarea"></textarea>
                    </div>
                </div>
                <button type="button" onclick="createPost();" class="btn btn-primary" style="margin-top:5%;float:right">Save</button>
            </form>
        </div>
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">

                <div class="row g-5">
                    <div class="col-lg-4">
                        <h3 class="footer-heading">About ZenBlog</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti
                            voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid
                            blanditiis omnis quae. Explicabo?</p>
                        <p><a href="about.html" class="footer-link-more">Learn More</a></p>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Navigation</h3>
                        <ul class="footer-links list-unstyled">
                            <li><a href="../index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
                            <li><a href="../index.php"><i class="bi bi-chevron-right"></i> Log in</a></li>
                            <li><a href="category.html"><i class="bi bi-chevron-right"></i> Categories</a></li>
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
                                        <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span>
                                        </div>
                                        <span>5 Great Startup Tips for Female Founders</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="single-post.html" class="d-flex align-items-center">
                                    <img src="../assets/img/post-sq-2.jpg" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span>
                                        </div>
                                        <span>What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="single-post.html" class="d-flex align-items-center">
                                    <img src="../assets/img/post-sq-3.jpg" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span>
                                        </div>
                                        <span>Life Insurance And Pregnancy: A Working Mom???s Guide</span>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="single-post.html" class="d-flex align-items-center">
                                    <img src="../assets/img/post-sq-4.jpg" alt="" class="img-fluid me-3">
                                    <div>
                                        <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                                            <span>Jul 5th '22</span>
                                        </div>
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
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                        uploadImages(files[0], this);

                    }
                }
            });
        });
    </script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>

</body>

</html>