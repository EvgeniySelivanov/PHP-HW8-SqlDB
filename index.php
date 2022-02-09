<?php
require_once 'config.php';
$pdo=new PDO('mysql:host='.HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php

 ?>
<?php
$action=$_POST['action']??null;
if($action){
    $action();//action===addBook,соответсвенно я вызываю функцию addBook();
}
function addBook(){
    global $pdo;
    $name=$_POST['name']??null;
    $price=$_POST['price']??null;
    if($name&&$price){
  // $sql='INSERT INTO books(name,price)VALUES ("'.htmlentities($name).'",'.$price.')';    
  // $pdo->query($sql);
$pr=$pdo->prepare('INSERT INTO books(name,price)VALUES(?,?)');
$pr->execute([$name,$price]);
    }
}



function editBook(){
 
   /* echo 'WORK!'; */
    global $pdo;
    $name=$_POST['name']??null;
    $price=$_POST['price']??null;
    $firstName=$_POST['firstName']??null;
    if($name&&$price&&$firstName)
    {
        /*  echo 'WORK!'; */
 
    $prd=$pdo->prepare('UPDATE books SET name=?,price=? WHERE name LIKE ?');   
    $prd->execute([$name,$price,$firstName]);
   
    }
}

?>


<?php 
$result=$pdo->query('SELECT id,name,price FROM books ORDER BY id DESC LIMIT 10');
$books=$result->fetchAll(PDO::FETCH_OBJ);
?>



<div class="container">
<a href="create.php" class="btn btn-primary">Create book</a>

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($books as $book):?>
        <tr>
      
            <td><?=$book->id?></td>
            <td><?=$book->name?></td>
            <td><?=$book->price?></td>
            <td></td>
            <td>
                
            <a href="edit.php?id=<?=$book->id?>&name=<?=$book->name?>&price=<?=$book->price?>" class="btn btn-warning">Edit book</a>
 
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

