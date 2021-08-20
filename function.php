<?php 
function connect() {
    $conn = new mysqli("localhost", "root", "", "autoplius");
return $conn;
}

function all() {
    $conn = connect();
    $sql = "SELECT * FROM `cars`";
    $result = $conn -> query($sql);
    $conn->close();
       return $result;
}
function find($id) {
    $sql = 'SELECT * FROM cars where id = "'.$id.'"';
    $conn = connect();
    $car = $conn -> query($sql);
    $conn->close();
    return (array) $car->fetch_assoc();
}


function store() {
    $conn = connect();
    $sql = "INSERT INTO `cars`(`id`, `manufacturer`, `model`, `fuel`, `year`, `distance`) VALUES (NULL,'".$_POST['manufacturer']."','".$_POST['model']."','".$_POST['fuel']."','".$_POST['year']."','".$_POST['distance']."');";
      $conn = connect();
     $conn -> query($sql);
     $conn->close();
   }


function update() {
    $sql = "UPDATE `cars`
     SET `manufacturer`=\"".$_POST['manufacturer']."\", 
    `model`=\"".$_POST['model']."\", 
    `fuel`=\"".$_POST['fuel']."\", 
    `year`=\"".$_POST['year']."\", 
    `distance`=\"".$_POST['distance']."\"
    WHERE `cars`.`id` = \"".$_POST['update']."\";";
    $conn = connect();
    $conn -> query($sql);
    $conn->close();
}
    function destroy(){
        $sql = 'DELETE FROM `cars` WHERE `cars`.`id` = '.$_POST['delete'];
        $conn = connect();
        $conn -> query($sql);
        $conn->close();
    }
?>