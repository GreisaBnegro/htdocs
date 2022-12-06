<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
    .product-container {
        position: relative;
        width: 33%;
        border: 1px #000 solid;
        text-align: center;
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
    <?php
    $sku = null;

    if (isset($_GET['sku'])) {
        $sku = $_GET['sku'];
    }
    ?>

    <button onclick="toggleCb()">Checkbox toggle</button>

    <?php if ($sku != null) { ?>
    <div class="product-container">
        <input type="checkbox" name="selected" class="js-cb" id="">
        <h2><?php echo $sku; ?></h2>
        <p>DESC</p>
        <p>Cena</p>
        <p>Parametri</p>
    </div>
    <div class="product-container">
        <input type="checkbox" name="selected" class="js-cb" id="">
        <h2><?php echo $sku; ?></h2>
        <p>DESC</p>
        <p>Cena</p>
        <p>Parametri</p>
    </div>
    <div class="product-container">
        <input type="checkbox" name="selected" class="js-cb" id="">
        <h2><?php echo $sku; ?></h2>
        <p>DESC</p>
        <p>Cena</p>
        <p>Parametri</p>
    </div>
    <?php } ?>


    <script>
    function toggleCb() {
        let cb_all = document.getElementsByClassName("js-cb");

        // Izeju cauri visam masīvam (array)
        for (let i = 0; i < cb_all.length; i++) {

            // sasīsinājums cb_all[i].checked = !cb_all[i].checked
            cb_all[i].checked ^= 1;
            console.log(cb_all[i].checked);

        }

        // cb_all.map(sel => sel.checked ^= 1);

    }
    </script>

</body>

</html>