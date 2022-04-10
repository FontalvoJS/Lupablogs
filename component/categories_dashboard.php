<?php
$user = $_COOKIE['active'];
$war = 0;
$politics = 0;
$globals = 0;
$healths = 0;
$covid = 0;
$sql = "SELECT `id`,`categoria` FROM `posts` WHERE username = '$user'";
$result = $DB->consulta($sql);
for ($i = 0; $i < count($result); $i++) {
    switch ($result[$i]['categoria']) {
        case 'War':
            $war++;
            break;
        case 'Politics':
            $politics++;
            break;
        case 'Global':
            $globals++;
            break;
        case 'Healths':
            $healths++;
            break;
        case 'Covid19':
            $covid++;
            break;
    }
}
?>
<div class="aside-block">
    <h3 class="aside-title">Categories</h3>
    <ul class="aside-links list-unstyled">
        <li><a href="category.php?categoria=War"><i class="bi bi-chevron-right"></i> War <span class="badge badge-primary" style="float:right"><?php echo $war; ?></span> </a></li>
        <li><a href="category.php?categoria=Politics"><i class="bi bi-chevron-right"></i> Politics <span class="badge badge-primary" style="float:right"><?php echo $politics; ?> </span> </a></li>
        <li><a href="category.php?categoria=Healths"><i class="bi bi-chevron-right"></i> Healths <span class="badge badge-primary" style="float:right"><?php echo $healths; ?> </span> </a></li>
        <li><a href="category.php?categoria=Global"><i class="bi bi-chevron-right"></i> Global <span class="badge badge-primary" style="float:right"><?php echo $globals; ?> </span> </a></li>
        <li><a href="category.php?categoria=Covid19"><i class="bi bi-chevron-right"></i> Covid 19 <span class="badge badge-primary" style="float:right"><?php echo $covid; ?> </span> </a></li>

    </ul>
</div>