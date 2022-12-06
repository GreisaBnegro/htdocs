<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <form action="/products/list.php">
        <input type="text" name="sku">
        <button type="submit">Nosūtīt</button>
    </form>

    <form method="GET" action="/">
        <input type="text" name="person" />
        <button>Submit</button>
    </form>
    <?php

    $name = "Human";
    if (isset($_GET['person'])) {
        $name = $_GET['person'];
    }
    echo $name . " is a BeAuTiFuL HOOMAN";
    ?>
</body>

</html>