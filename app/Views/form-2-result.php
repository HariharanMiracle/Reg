<html>
<head>
    <title>Payment Confirmation</title>

    <link rel="stylesheet" href="<?php echo base_url().'/bootstrap/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url().'/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url().'/bootstrap/custom.css'; ?>">
</head>
<body class="container" style="background-color: #dfedf0">

    <div class="card mt-4">
        <div class="card-header bg-success"></div>
        <div class="card-body">
            <h1>IOLPS Payment Confirmation</h1>
        </div>
    </div>


    <?php
        if($err == 0){
            // no error
            ?>
            <div class="card mt-4">
                <div class="card-header bg-success"></div>
                <div class="card-body text-center">
                    <h2 class="text-success">Payments added, you will get a response soon from us.</h2>
                </div>
            </div>            
            <?php
        }
        else{
            // error
            ?>
            <div class="card mt-4">
                <div class="card-header bg-danger"></div>
                <div class="card-body text-center">
                    <h2 class="text-danger"><?php echo $msg; ?></h2>
                    <a href = "<?php echo base_url().'/Register/paymentform' ?>">Payment form</a>
                </div>
            </div>             
            <?php
        }
    ?>    
</body>
</html>