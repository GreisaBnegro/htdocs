<!DOCTYPE html>
<html lang="en">
<?php
require_once('../src/helpers.php');

$db = establish_connection();
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Fira+Sans:wght@400;500&family=Neonderthaw&display=swap"
        rel="stylesheet" />
    <style>
    .header {
        display: flex;
        height: 48px;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 40px;
        align-items: center;
    }

    .product-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        column-gap: 40px;
        row-gap: 20px;
    }

    .product-info {
        position: relative;

        border: 1px #000 solid;
        text-align: center;
        font-family: Fira Sans, Calibri, Arial, sans-serif;
    }

    .js-cb {
        position: absolute;
        top: 0;
        left: 0;
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="header">
        <div class="left-side">
            <p>Product List</p>
        </div>
        <div class="right-side">
            <a href="/products/new.php">Add new product</a>
            <button onclick="toggleCb()">Mass Delete Action</button>
            <button submit="">Apply</button>
        </div>
    </div>

    <div class="product-grid">
        <?php
        //Step2
        $query = "SELECT `products`.`ID`, `products`.`SKU`, `products`.`Name`, `products`.`Price`, `types`.`Name` AS `type_name`, `products`.`type_value` FROM `products` LEFT JOIN `types` ON `products`.`type_id` = `types`.`ID`";
        // mysqli_query($db, $query) or die('Error querying database.');
        //Step3
        $result = mysqli_query($db, $query) or die('Error querying database.');
        while ($row = mysqli_fetch_array($result)) { ?>
        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p><?php echo $row['SKU'] ?></p>
            <!-- SKU -->
            <p><?php echo $row['Name'] ?></p>
            <!-- Description -->
            <p><?php echo number_format($row['Price'], 2, '.', '') ?> $</p>
            <!-- PRICE -->
            <p><?php echo $row['type_name'] ?>: <?php echo $row['type_value'] ?></p>
            <!-- Type id + type value -->
        </div>
        <!-- echo $row['SKU'] . ' ' . $row['Name'] . ': ' . $row['Price'] . ' ' . $row['type_name'] . '<br />'; -->

        <?php } ?>


        <!-- <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>JVC200123</p>
            <p>Acme DISC</p>
            <p>1.00 $</p>
            <p>Size: 700 MB</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>JVC200123</p>
            <p>Acme DISC</p>
            <p>1.00 $</p>
            <p>Size: 700 MB</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id=""" />
        <p>JVC200123</p>
        <p>Acme DISC</p>
        <p>1.00 $</p>
        <p>Size: 700 MB</p>
      </div>

      <div class=" product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>GGWP0007</p>
            <p>War and Peace</p>
            <p>20.00 $</p>
            <p>Weight: 2 KG</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>GGWP0007</p>
            <p>War and Peace</p>
            <p>20.00 $</p>
            <p>Weight: 2 KG</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>GGWP0007</p>
            <p>War and Peace</p>
            <p>20.00 $</p>
            <p>Weight: 2 KG</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>GGWP0007</p>
            <p>War and Peace</p>
            <p>20.00 $</p>
            <p>Weight: 2 KG</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>TR120555</p>
            <p>Chair</p>
            <p>40.00 $</p>
            <p>Dimension: 24x45x15</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>TR120555</p>
            <p>Chair</p>
            <p>40.00 $</p>
            <p>Dimension: 24x45x15</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>TR120555</p>
            <p>Chair</p>
            <p>40.00 $</p>
            <p>Dimension: 24x45x15</p>
        </div>

        <div class="product-info">
            <input type="checkbox" name="selected" class="js-cb" id="" />
            <p>TR120555</p>
            <p>Chair</p>
            <p>40.00 $</p>
            <p>Dimension: 24x45x15</p>
        </div> -->
    </div>
</body>

</html>