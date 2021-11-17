<?php

    require './db_conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Todo List</title>
</head>

<body class="bg-secondary">

    <div class="container " style="max-width: 480px;">
        <div class="card p-3 m-3" >
            <div>
                <input class="form-control" type="text" placeholder="Preencha aqui">
            </div>
            <button class="btn btn-primary mt-2">Add</button>
        </div>

        <?php
            $todos = $conn->query("SELECT * FROM todo_list.todos ORDER BY id DESC");
        ?>

        <div class="card p-3 m-3">
            <div class="card p-3">
                <?php if($todos->rowCount() <= 0) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="" id=""> 
                        <label class="form-check-label" for="">This is empty</label>
                    </div>
                    <small class="fw-light">EMPITY!</small>
                <?php } while($todo = $todos->fetch(PDO::FETCH_ASSOC)) {?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="" id=""> 
                        <label class="form-check-label" for="">This is blablbla</label>
                    </div>
                    <small class="fw-light">created at 16/11/2021</small>
                <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>