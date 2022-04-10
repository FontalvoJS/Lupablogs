<table class="table mb-5">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Date post</th>
            <th scope="col">Autor</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody>

        <?php
        $user = $_COOKIE['active'];
        $sql = "SELECT * FROM posts WHERE username = '$user' ORDER BY fecha";
        $result = $DB->consulta($sql);
        if ($result) {

            foreach ($result as $valor) {
        ?>
                <tr id="id<?php echo $valor['id']; ?>">
                    <td><?php echo $valor['titulo']; ?></td>
                    <td><?php echo $valor['categoria']; ?></td>
                    <td><?php echo $valor['fecha']; ?></td>
                    <td><?php echo $valor['username']; ?></td>
                    <td>
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            <ul class="dropdown-menu" style="max-width:50px">
                                <li class="dropdown-item" onclick="deletePost(<?php echo $valor['id']; ?>)"><i class="fas fa-trash"></i></li>
                                <li class="dropdown-item" onclick="location.href='../vistas/editPost.php?id=<?php echo $valor['id']; ?>'"><i class="fas fa-edit"></i></li>
                                <li class="dropdown-item" onclick="location.href='../vistas/article.php?id=<?php echo $valor['id']; ?>'"><i class="fas fa-external-link"></i></li>

                            </ul>
                        </div>
                    </td>

                </tr>
            <?php
            }
        } else {

            ?>
            <tr>
                <td>Crea tu primer artículo</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>