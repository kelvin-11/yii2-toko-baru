<?php

use yii\helpers\Html;

$this->title = 'Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="background-color:blue">
    <div class="row">
        <div class="col-lg-9 text-light p-1">
            <h1 class="ms-2 ms-5"><b><?= Html::encode($this->title) ?></b></h1>
        </div>
        <div class="col-lg-3">
            <p>
                <?= Html::a('Create Customer', ['create'], ['class' => 'btn ms-4 btn-success mt-2']) ?>
            </p>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Customer ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $data) { ?>
                <tr>
                    <td><?= $data->id ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->email ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>