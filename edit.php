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
    <div class="container">
        <h1>Edit book
        </h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>



                <?php
                
                $nameBook=$_GET['name'];
$priceBook=$_GET['price'];
         /*     echo $nameBook;
             echo $priceBook; */
                ?>



            <input type="text " class="form-control" name="name"  value="<?=$nameBook?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text " class="form-control" name="price"  value="<?=$priceBook?>">
            </div>
            <input type="hidden" name="firstName" value="<?=$nameBook?>">
            <input type="hidden" name="action" value="editBook">
            <button class="btn btn-primary mt-2">Save</button>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>