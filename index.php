<!DOCTYPE html>
<html lang="en">

<head>

    <title>Document</title>
</head>

<body>
    <ul>
        <li>
            <a href="/products/list.php">All products</a>
        </li>
    </ul>

    <form action="/products/list.php">
        <input type="text" name="sku">
        <button type="submit">Nosūtīt</button>
    </form>

    <form method="GET" action="/">
        <input type="text" name="person" />
        <button>Submit</button>
        <p>Hi</p>
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