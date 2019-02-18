<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("_partials/head.php");?>


</head>

<body>
    <?php $this->load->view("_partials/body.php");?>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif;?>




    <form action="<?php echo base_url('content/add')?>" method="POST" enctype="multipart/form-data">

        <input class="form-control <?php echo form_error('product_name') ? 'is-invalid':'' ?>" type="text"
            name="product_name" placeholder="Product name" />
        <div class="invalid-feedback">
            <?php echo form_error('product_name') ?>
        </div>

        <input class="form-control <?php echo form_error('product_price') ? 'is-invalid':'' ?>" type="text"
            name="product_price" placeholder="Product Price" />
        <div class="invalid-feedback">
            <?php echo form_error('product_price') ?>
        </div>

        <input class="form-control <?php echo form_error('product_description') ? 'is-invalid':'' ?>" type="text"
            name="product_description" placeholder="Product Description" />
        <div class="invalid-feedback">
            <?php echo form_error('product_description') ?>
        </div>

        <input class="btn btn-success" type="submit" name="btn" value="Save" />
    </form>

    <table border='1'>
        <tr>
            <th>Product Name </th>
            <th>Product Price </th>
            <th>Product Description </th>
        </tr>
        <?php foreach ($products as $product):?>
        <tr>
            <td><?php echo $product->product_name;?> </td>
            <td><?php echo $product->product_price;?> </td>
            <td><?php echo $product->product_description;?> </td>
        </tr>
        <?php endforeach;?>
    </table>
</body>

<footer>
    <?php $this->load->view("_partials/footer.php");?>

</footer>

</html>