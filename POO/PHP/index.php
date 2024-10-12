<?php
require_once './Todo.php';

$t1 = new Todo('faire les courses','Acheter du pain, des oeufs...');
$t2 = new Todo('faire un sandwich','Mettre les oeufs dans le pain...');

$todolist = [$t1, $t2];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>Todo</h1>
    <div class="row">
        <?php 
        foreach($todolist as $todo){ ?>
            <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $todo->get_name(); ?>
                    </h5>
                    <p class="card-text"><?php $this->get_description();?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
      <?php  } ?>
        
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
