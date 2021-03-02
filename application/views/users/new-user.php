<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>

<body>
    <?php echo form_open(''); ?>
    <div class="container">
        <a class="btn btn-primary mt-5" href=<?php echo base_url("usuarios/1") ?>>Regresar</a>
        <div class="row">
            <div class="col">
                <div class="mt-5 mb-3">
                    <?php
                    echo form_label('Nombre', 'first_name');

                    $input = array(
                        'name' => 'first_name',
                        'value' => $first_name,
                        'class' => 'form-control input-lg'
                    );

                    echo form_input($input);
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                    echo form_label('Apellido', 'last_name');

                    $input = array(
                        'name' => 'last_name',
                        'value' => $last_name,
                        'class' => 'form-control input-lg'
                    );

                    echo form_input($input);
                    ?>
                </div>
                <div class="mb-3">
                    <?php
                    echo form_label('Email', 'email');

                    $input = array(
                        'name' => 'email',
                        'value' => $email,
                        'class' => 'form-control input-lg'
                    );

                    echo form_input($input);
                    ?>
                </div>
                <div>
                    <label for="City" class="form-label">Ciudad</label>
                    <select class="custom-select mb-3" name="city_id">
                        <option value="">Seleccione su ciudad</option>
                        <?php foreach ($cities as $city) { ?>
                            <?php if (isset($city_id)) { ?>
                                <option value="<?php echo $city->id ?>" <?php echo ($city_id == $city->id) ? "selected" : "" ?>> <?php echo $city->name ?> </option>
                            <?php } else { ?>
                                <option value="<?php echo $city->id ?>"> <?php echo $city->name ?> </option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <a href="<?php echo base_url("usuarios/1")?>"><?php
                echo form_submit('mysubmit', 'Enviar', "class='btn btn-primary'");
                ?></a>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
</body>

</html>