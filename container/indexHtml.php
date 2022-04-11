<?php
require '../modelo/conexion.php';
$DB = new DB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $_COOKIE['active'] ?> | Lupa Community Blogger</title>
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

        <!-- ======= Hero Slider Section ======= -->
        <section id="hero-slider" class="hero-slider">
            <div class="container-md" data-aos="fade-in">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper ">
                            <div class="swiper-wrapper">

                                <?php
                                $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,1";
                                $result = $DB->consulta($sql);
                                foreach ($result as  $value) {
                                ?>
                                    <div class="swiper-slide">
                                        <a href="../vistas/article.php?id=<?php echo $value['id']; ?>" class="img-bg d-flex align-items-end" style="background-image: url(../assets/portadas_articulos/<?php echo $value['Imagen']; ?>);">
                                            <div class="img-bg-inner">
                                                <h2><?php echo $value["titulo"]; ?></h2>
                                                <p><?php echo $value['descripcion']; ?></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="custom-swiper-button-next">
                                <span class="bi-chevron-right"></span>
                            </div>
                            <div class="custom-swiper-button-prev">
                                <span class="bi-chevron-left"></span>
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Slider Section -->

        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <?php
                        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 1,1";
                        $result = $DB->consulta($sql);
                        foreach ($result as  $value) {
                        ?>
                            <div class="post-entry-1 lg">
                                <a href="../vistas/article.php?id=<?php echo $value['id'] ?>"><img src="../assets/portadas_articulos/<?php echo $value['Imagen'] ?>" alt="" class="img-fluid"></a>
                                <div class="post-meta"><span class="date"><?php echo $value['categoria'] ?></span> <span class="mx-1">&bullet;</span> <span><?php echo substr($value['fecha'], 0, -9); ?></span></div>
                                <h2><a href="../vistas/article.php?id=<?php echo $value['id']; ?>"><?php echo $value['titulo'] ?></a></h2>
                                <p class="mb-4 d-block"><?php echo $value['descripcion'] ?></p>

                                <div class="d-flex align-items-center author">
                                    <div class="name">
                                        <h3 class="m-0 p-0"><?php echo $value['username'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                <?php
                                $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 2,3";
                                $result = $DB->consulta($sql);
                                foreach ($result as  $value) {
                                ?>
                                    <div class="post-entry-1">
                                        <a href="../vistas/article.php?id=<?php echo $value['id'] ?>"><img src="../assets/portadas_articulos/<?php echo $value['Imagen']; ?>" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date"><?php echo $value['categoria']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo substr($value['fecha'], 0, -9) ?></span></div>
                                        <h2><a href="../vistas/article.php?id=<?php echo $value['id']; ?>"><?php echo $value['titulo']; ?></a></h2>
                                    </div>
                                <?php
                                } ?>
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                <?php
                                $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 5,4";
                                $result = $DB->consulta($sql);
                                foreach ($result as  $value) {
                                ?>
                                    <div class="post-entry-1">
                                        <a href="../vistas/article.php?id=<?php echo $value['id'] ?>"><img src="../assets/portadas_articulos/<?php echo $value['Imagen']; ?>" alt="" class="img-fluid"></a>
                                        <div class="post-meta"><span class="date"><?php echo $value['categoria']; ?></span> <span class="mx-1">&bullet;</span> <span><?php echo substr($value['fecha'], 0, -9) ?></span></div>
                                        <h2><a href="../vistas/article.php?id=<?php echo $value['id']; ?>"><?php echo $value['titulo']; ?></a></h2>
                                    </div>
                                <?php
                                } ?>
                            </div>

                            <!-- Trending Section -->
                            <div class="col-lg-4">

                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        <?php
                                        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,3";
                                        $result = $DB->consulta($sql);
                                        $i = 1;
                                        foreach ($result as  $value) {
                                        ?>
                                            <li>
                                                <a href="../vistas/article.php?id=<?php echo $value['id'] ?>">
                                                    <span class="number"><?php echo $i++; ?></span>
                                                    <h3><?php echo $value['titulo'] ?></h3>
                                                    <span class="author"><?php echo $value['username'] ?></span>
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div> <!-- End Trending Section -->
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->

        <!-- ======= Culture Category Section ======= -->
        <section class="category-section">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5 d-none">
                    <h2>Culture</h2>
                    <div><a href="category.html" class="more">See All Culture</a></div>
                </div>

                <div class="row">
                    <div class="col-md-9 d-none">

                        <div class="d-lg-flex post-entry-2">
                            <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul
                                        5th '22</span></div>
                                <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing
                                        Now?</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni
                                    voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente,
                                    laudantium dolorum itaque libero eos deleniti?</p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">Wade Warren</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 d-none">
                                <div class="post-entry-1 border-bottom">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                                        repudiandae, inventore pariatur numquam cumque possimus</p>
                                </div>

                                <div class="post-entry-1">
                                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>
                            </div>
                            <div class="col-lg-8 d-none">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                            Calls?</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                                        repudiandae, inventore pariatur numquam cumque possimus</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 d-none">
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                    Calls?</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom ">
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire
                                    Your New Haircut</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a>
                            </h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- End Culture Category Section -->

        <!-- ======= Business Category Section ======= -->
        <section class="category-section d-none">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Business</h2>
                    <div><a href="category.html" class="more">See All Business</a></div>
                </div>

                <div class="row">
                    <div class="col-md-9 order-md-2">

                        <div class="d-lg-flex post-entry-2">
                            <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                                <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                                        5th '22</span></div>
                                <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing
                                        Now?</a></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni
                                    voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente,
                                    laudantium dolorum itaque libero eos deleniti?</p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="assets/img/person-4.jpg" alt="" class="img-fluid"></div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">Wade Warren</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="post-entry-1 border-bottom">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                                        repudiandae, inventore pariatur numquam cumque possimus</p>
                                </div>

                                <div class="post-entry-1">
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>
                            </div>
                            <div class="col-lg-8 d-none">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                                            5th '22</span></div>
                                    <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                            Calls?</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                                        repudiandae, inventore pariatur numquam cumque possimus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                    Calls?</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will Inspire
                                    Your New Haircut</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium Hair</a>
                            </h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
                            </h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th
                                    '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Business Category Section -->

        <!-- ======= Lifestyle Category Section ======= -->
        <section class="category-section d-none">
            <div class="container" data-aos="fade-up">

                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>Lifestyle</h2>
                    <div><a href="category.html" class="more">See All Lifestyle</a></div>
                </div>

                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                                    5th '22</span></div>
                            <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                            <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                                repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus
                                eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque.
                                Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/person-7.jpg" alt="" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Esther Howard</h3>
                                </div>
                            </div>
                        </div>

                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                                    5th '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples Away)</a>
                            </h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                        <div class="post-entry-1">
                            <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span> <span>Jul
                                    5th '22</span></div>
                            <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                            <span class="author mb-3 d-block">Jenny Wilson</span>
                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 17th '22</span>
                                    </div>
                                    <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-4.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Mar 15th '22</span>
                                    </div>
                                    <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the
                                            Web?</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Mar 1st '22</span>
                                    </div>
                                    <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                                            Calls?</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will
                                            Inspire Your New Haircut</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium
                                            Hair</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">Life Insurance And Pregnancy: A Working Mom’s Guide</a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples
                                            Away)</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                                <div class="post-entry-1 border-bottom">
                                    <div class="post-meta"><span class="date">Lifestyle</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section><!-- End Lifestyle Category Section -->

    </main><!-- End #main -->

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
                                        <span>Life Insurance And Pregnancy: A Working Mom’s Guide</span>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/ajax.js"></script>

</body>

</html>