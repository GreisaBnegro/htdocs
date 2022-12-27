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
    <title>Product New</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&family=Fira+Sans:wght@400;500&family=Neonderthaw&display=swap"
        rel="stylesheet" />
    <style>
    .header {
        display: flex;
    }

    .js-cb {
        position: absolute;
        top: 0;
        left: 0;
        text-align: left;
    }

    .descr {
        width: 680px;
        height: 300px;
    }

    .size {
        word-wrap: break-word;
    }
    </style>
</head>
<?php

// Iegūstam dropdown tipus
$dropdownSelect = "SELECT * FROM `types`";
$dropdownSelectResult = mysqli_query($db, $dropdownSelect) or die('Error querying database.');
$dropdownSelectResult2 = mysqli_query($db, $dropdownSelect) or die('Error querying database.');

//Step2
// dd($_SERVER);
// Strādā tikai pie POST metodes
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // dd($_POST);
    $sku = isset($_POST["sku_input"]) ? $_POST["sku_input"] : "";
    $name = isset($_POST["name_input"]) ? $_POST["name_input"] : "";
    $price = isset($_POST["price_input"]) ? $_POST["price_input"] : "";
    $type = isset($_POST["type"]) ? $_POST["type"] : "";
    $type_value = "";
    if ($_POST["type"] === "1") {
        $type_value = isset($_POST["size"]) ? $_POST["size"] : "";
    } else if ($_POST["type"] === "2") {
        $height = isset($_POST["height"]) ? $_POST["height"] : "";
        $width = isset($_POST["width"]) ? $_POST["width"] : "";
        $length = isset($_POST["length"]) ? $_POST["length"] : "";
        $type_value = $height . "x" . $width . "x" . $length;
    } else if ($_POST["type"] === "3") {
        $type_value = isset($_POST["weight"]) ? $_POST["weight"] : "";
    } else {
        die("Error!");
    }
    $insertQueryTemplate = "INSERT INTO `products`(`SKU`, `Name`, `Price`, `type_id`, `type_value`) VALUES ('%s', '%s', %s, %s, '%s')";
    $inputQuery = sprintf($insertQueryTemplate, $sku, $name, $price, $type, $type_value);

    mysqli_query($db, $inputQuery) or die('Error querying database.');
}

?>

<body>
    <form action="/products/new.php" method="POST">
        <div class="header">
            <div class="left-side">
                <p>Product Add</p>
            </div>
            <div class="right-side">
                <button type="submit">Save</button>
            </div>
        </div>
        <div>
            <label for="sku_input">SKU</label>
            <input required type="text" id="sku_input" name="sku_input" placeholder="123" />
        </div>
        <label for="name_input">Name</label>
        <input type="text" name="name_input" id="name_input" />
        <label for="price_input">Price</label>
        <input type="text" id="price_input" name="price_input" />
        <label for="type">Type Switcher</label>
        <select name="type" id="type">
            <option value="tp">Type Sitcher</option>
            <?php while ($dropDownRow = mysqli_fetch_array($dropdownSelectResult)) { ?>
            <option value="<?php echo $dropDownRow['ID'] ?>"><?php echo $dropDownRow['Name'] ?></option>
            <?php } ?>
        </select>
        <?php while ($row = mysqli_fetch_array($dropdownSelectResult2)) { ?>
        <div class="dropdown-types" id="<?php echo $row['ID'] ?>" style="display: none">

            <?php
                $inputs = explode(';', $row['input']);
                foreach ($inputs as $input) {
                    $formatting = explode(',', $input);
                ?>
            <label for="<?php echo $formatting[2] ?>"><?php echo $formatting[0] ?></label>
            <input type="<?php echo $formatting[1] ?>" name="<?php echo $formatting[2] ?>" />
            <?php } ?>
            <p style="width: 15rem">
                <?php echo $row['description'] ?>
            </p>
        </div>
        <?php } ?>
    </form>
    <script src="../public/scripts/AddPage.js"></script>
</body>

</html>