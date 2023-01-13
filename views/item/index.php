<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
echo Html::csrfMetaTags();
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
        <div class="col-lg-4 text-light p-1">
            <h1 class="ms-2"><b><?= Html::encode($this->title) ?></b></h1>
        </div>
        <div class="col-lg-6">
            <!-- <form action="<?= \yii\helpers\Url::to(['item/index']) ?>" method="POST" id="search">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken ?>">
            </form>
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control mt-3" placeholder="search">
                </div>
                <button type="button" class="btn btn-primary mt-3" onclick="document.querySelector('#search').submit()">
                    <i class="fas fa-search"></i>
                </button>
            </div> -->
        </div>
        <div class="col-lg-2">
            <p>
                <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success ms-4 mt-2']) ?>
            </p>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category_id</th>
                <th scope="col">Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $data) { ?>
                <tr>
                    <td><?= $data->id ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->price ?></td>
                    <td><?= $data->category->name ?></td>

                    <td>
                        <a class="btn btn-warning" href="<?= Url::to(['item/view', 'id' => $data->id]); ?>">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?= Html::a("<i class='fa fa-trash-alt'></i>", ["delete", "id" => $data->id], [
                            "class" => "btn btn-danger",
                            "title" => "Hapus Data",
                            "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                            "data-method" => "POST"
                        ]); ?>
                        <a class="btn btn-primary" href="<?= Url::to(['item/update', 'id' => $data->id]); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>