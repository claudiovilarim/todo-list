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
            <form action="./app/add.php" method="POST" class="d-grid">
                <div>
                    <input name="title" class="form-control" type="text" placeholder="Preencha aqui" autocomplete="off" required>
                </div>
                <button class="btn btn-primary mt-2 btn-block">Add</button>
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'enviado') {echo 'Item gravado!';} ?>
            </form>
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
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-check">
                                <?php if($todo['checked']){ ?>
                                    <input class="form-check-input" type="checkbox" name="" id="" checked> 
                                    <label class="form-check-label" for="">
                                        <s class="text-secondary"> <?php echo $todo['title'] ?> </s> 
                                    </label>
                                <?php } else{ ?>
                                    <input class="form-check-input" type="checkbox" name="" id=""> 
                                    <label class="form-check-label" for="">
                                        <?php echo $todo['title'] ?>
                                    </label>
                                <?php } ?>
                            </div>
                                
                            <small class="fw-light">created at  <?php echo $todo['date_time'] ?> </small>
                        </div>
                        <div class="col-md-2">
                            <span id="<?= $todo['id']; ?>">x</span>
                        </div>
                    </div>
                    <br>
                <?php } ?>
            </div>
        </div>
    </div>

</body>
</html>