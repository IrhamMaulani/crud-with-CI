<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <form action="<?php echo base_url('content/update')?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $product->id;?>" />

        <input class="form-control <?php echo form_error('product_name') ? 'is-invalid':'' ?>" type="text"
            name="product_name" placeholder="Product name" value="<?php echo $product->product_name;?>" />
        <div class="invalid-feedback">
            <?php echo form_error('product_name') ?>
        </div>

        <input class="form-control <?php echo form_error('product_price') ? 'is-invalid':'' ?>" type="text"
            name="product_price" placeholder="Product Price" value="<?php echo $product->product_price;?>" />
        <div class="invalid-feedback">
            <?php echo form_error('product_price') ?>
        </div>

        <input class="form-control <?php echo form_error('product_description') ? 'is-invalid':'' ?>" type="text"
            name="product_description" placeholder="Product Description"
            value="<?php echo $product->product_description;?>" />
        <div class="invalid-feedback">
            <?php echo form_error('product_description') ?>
        </div>


        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>

</body>

</html>