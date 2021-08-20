<?php 
include('./function.php');

if(isset($_POST['create'])) {
    store();
    header("location:./");
    die;
}
if(isset($_GET['edit'])) {
$car = find($_GET['edit']);
}
if(isset($_POST['update'])) {
 update();
 header("location:./");
    die;
}

if(isset($_POST['delete'])) {
destroy();
header("location:./");
die;
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<form action="" method="POST" >
    <input type="text" name="manufacturer" placeholder="manufacturer" value="<?= (isset($car))? $car['manufacturer'] : "" ?>">
    <input type="text" name="model" placeholder="model" value="<?= (isset($car))? $car['model'] : "" ?>">
    <input type="text" name="fuel" placeholder="fuel" value="<?= (isset($car))? $car['fuel'] : "" ?>">
    <input type="text" name="year" placeholder="year" value="<?= (isset($car))? $car['year'] : "" ?>">
    <input type="text" name="distance" placeholder="distance" value="<?= (isset($car))? $car['distance'] : "" ?>">
    <?php 
    if(isset($car)) {
        echo '<button type="submit" name="update" value="'.$car['id'].'" class="btn btn-dark">Pakeisti</button>';
    }
    else {
        echo '<button class="btn btn-secondary" type="submit" name="create" >Ivesti</button>';
    }
    ?>
</form>
<table class="table">
<tr class="text-capitalize">
    <th >id</th>
    <th>manufacturer</th>
    <th>model</th>
    <th>fuel</th>
    <th>year</th>
    <th>distance</th>
    <th>update</th>
    <th>delete</th>
</tr>
<?php foreach (all() as $cars) { ?>
    <tr class="text-capitalize">
    <td class="text-danger"> <?=$cars['id']?> </td>
    <td> <?=$cars['manufacturer']?> </td>
    <td> <?=$cars['model']?> </td>
    <td> <?=$cars['fuel']?> </td>
    <td> <?=$cars['year']?> </td>
    <td> <?=$cars['distance']?> </td>
    <td>
        <a href="?edit=<?=$cars['id']?>" class="btn btn-warning">Edit</a>
    </td>
    <td>
        <form action="" method="POST">
            <button class="btn btn-danger" type="submit" name="delete" value="<?=$cars['id']?>">Delete</button>
        </form>
    </td>
</tr>
<?php } ?>
</body>
</html>