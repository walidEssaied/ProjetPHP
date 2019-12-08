<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert product</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<form action="" method="post" accept-charset="utf-8">
		<label>Description<input type="text" name="description" ></label><br>
		<label>prix<input type="text" name="prix"></label><br>
		<input type="submit">
    </form>

    <?php
        if (!empty($_POST)) {
            $descriotion = $_POST['description'];
            $prix = $_POST['prix'];

            include 'dbconnect.php';

            $nb = $cnx->exec("INSERT INTO product(description,prix) VALUES ('$description','$prix')");

            echo $nb.' Product ajouté avec succés';
        }
    ?>
</body>
</html>