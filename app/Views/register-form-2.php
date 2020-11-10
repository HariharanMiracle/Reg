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
            <h1>IOLPS Payment Form</h1>
            <br/>
            <h5>Fill out this form to validate your payment.</h5>
            <br/>
            <h5 class="text-danger">*Required</h5>
        </div>
    </div>

    <form action="<?php echo base_url('Register/saveform2');?>" name="register-form-2" id="register-form-2" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="student_number"><h5>Student Number<span id="err-name" style="color:red;">*</span></h5></label>
                    <input type="text" name="student_number" id="student_number" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="file-payment"><h5>Attach Payment Slip<span id="err-file-payment" style="color:red;">*</span></h5></label>
                    <input type="file" name="file-payment" class="form-control" id="file-payment" required>                    
                </div>
            </div>
        </div> 
        
        <br/>

        <div class="row">
            <div class="col-12">
                <input class="btn btn-success btn-lg" type = "submit" value = "Submit" name = "submit"/>
            </div>
        </div>   

    </form>

</body>
</html>