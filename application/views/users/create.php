<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col">
      <a class="btn btn-primary mt-5" href=<?php echo base_url("nuevo_usuario")?>>Nuevo Registro</a>
        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Email</th>
              <th scope="col">Ciudad</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $key => $u) : ?>
              <tr>
                <th scope="row"><?php echo $u->id ?></th>
                <td><?php echo $u->first_name ?></td>
                <td><?php echo $u->last_name ?></td>
                <td><?php echo $u->email ?></td>
                <td><?php echo $u->city_name ?></td>
                <td>
                  <a href="<?php echo base_url("nuevo_usuario/"). $u->id ?>">Editar</a>
                  <a href="<?php echo base_url("borrar_usuario/"). $u->id ?>">Borrar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">

              <?php
                $prev = $current_page - 1;
                $next = $current_page + 1;

                if ($prev <= 0) {
                  $prev = 1;
                }

                if ($next > $last_page) {
                  $next = $last_page;
                }
              ?>

            <li class="page-item"><a class="page-link" href="<?php echo base_url(). "usuarios/" . $prev?>">Previous</a></li>

            <?php for ($i=1; $i <= $last_page ; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?php echo base_url(). "usuarios/" . $i?>"><?php echo $i?></a></li>
            <?php } ?>
            <li class="page-item"><a class="page-link" href="<?php echo base_url(). "usuarios/" . $next?>">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</body>

</html>