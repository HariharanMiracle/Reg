<html>
<head>
    <title>Registration</title>

    <link rel="stylesheet" href="<?php echo base_url().'/bootstrap/css/bootstrap.min.css'; ?>">
    <script src="<?php echo base_url().'/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url().'/bootstrap/custom.css'; ?>">
</head>
<body class="container" style="background-color: #dfedf0">

    <div class="card mt-4">
        <div class="card-header bg-success"></div>
        <div class="card-body">
            <h1>IOLPS Registration Form</h1>
            <br/>
            <h5>Fill out this form, you will recieve a mail and then you can confirm your payment.</h5>
            <h5>Already registered? Click <a href = "<?php echo base_url().'/Register/paymentform' ?>">here</a> for the payment confirmation form.</h5>
            <br/>
            <h5 class="text-danger">*Required</h5>
        </div>
    </div>

    <form action="<?php echo base_url('Register/saveform1');?>" name="register-form" id="register-form" method="post" accept-charset="utf-8" enctype="multipart/form-data" onsubmit="return validate()">
    
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="email"><h5>Email Address<span id="err-email" style="color:red;">*</span></h5></label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="name"><h5>Name | නම<span id="err-name" style="color:red;">*</span></h5></label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="program"><h5>Select the Program | අවශ්‍ය පාඨමාලාව තෝරන්න<span id="err-program" style="color:red;">*</span></h5></label>
                    <select id="program" name="program" class="form-control" onchange="validateProgram()">
                        <option value="0">Choose</option>
                        <?php
                            foreach($course as $courseObj){
                                ?><option value="<?php echo $courseObj['id'] ?>"><?php echo $courseObj['name'] ?></option><?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>           

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="nic"><h5>NIC| ජාතික හැදුනුම්පත් අංකය<span id="err-nic" style="color:red;">*</span></h5></label>
                    <input type="text" name="nic" id="nic" class="form-control" onkeyup="validateNic()" required>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="number"><h5>Phone number | දුරකථන අංකය<span id="err-number" style="color:red;">*</span></h5></label>
                    <input type="text" name="number" id="number" class="form-control" onkeyup="validateNumber()" required>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="age"><h5>Age | වයස<span id="err-age" style="color:red;">*</span></h5></label>
                    <input type="number" name="age" id="age" class="form-control" required>
                </div>
            </div>
        </div>

        
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="district"><h5>District | දිස්ත්‍රික්කය<span id="err-district" style="color:red;">*</span></h5></label>
                    <input type="text" name="district" id="district" class="form-control" required>
                </div>
            </div>
        </div>        

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="divisional-secretariat"><h5>Divisional Secretariat | ප්‍රාදේශිය ලේකම් කොට්ඨාශය<span id="err-divisional-secretariat" style="color:red;">*</span></h5></label>
                    <input type="text" name="divisional-secretariat" id="divisional-secretariat" class="form-control" required>
                </div>
            </div>
        </div>    

        
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="occupation"><h5>Occupation | රැකියාව<span id="err-occupation" style="color:red;">*</span></h5></label>
                    <input type="text" name="occupation" id="occupation" class="form-control" required>
                </div>
            </div>
        </div>    

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="workplace"><h5>Workplace | සේවා ස්ථානය<span id="err-workplace" style="color:red;">*</span></h5></label>
                    <input type="text" name="workplace" id="workplace" class="form-control" required>
                </div>
            </div>
        </div>    

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="workplace-address"><h5>Workplace Address | සේවා ස්ථාන ලිපිනය<span id="err-workplace-address" style="color:red;">*</span></h5></label>
                    <input type="text" name="workplace-address" id="workplace-address" class="form-control" required>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="highest-education-qualifications"><h5>Highest Education Qualifications | අධ්‍යාපන සුදුසුකම්<span id="err-highest-education-qualifications" style="color:red;">*</span></h5></label>
                    <div class="radio">
                        <label><h5><input type="radio" name="highest-education-qualifications" id = "r1" value="GCE O/L" onclick="validateHEQ()"> GCE O/L</h5></label>
                    </div>
                    <div class="radio">
                        <label><h5><input type="radio" name="highest-education-qualifications" id = "r2" value="GCE A/L" onclick="validateHEQ()"> GCE A/L</h5></label>
                    </div>      
                    <div class="radio">
                        <label><h5><input type="radio" name="highest-education-qualifications" id = "r3" value="Diploma" onclick="validateHEQ()"> Diploma</h5></label>
                    </div>
                    <div class="radio">
                        <label><h5><input type="radio" name="highest-education-qualifications" id = "r4" value="Other" onclick="validateHEQ()"> Other</h5></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4 bg-light">
            <div class="card-body">
                <h5>Certificate Upload</h5>
                <h5>ලියාපදිංචිය සදහා අවශ්‍ය සහතිකපත් වල ඡායාරූප හෝ PDF ආකාරයෙන් සකසා Upload කරන්න.</h5>
            </div>
        </div>        

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="file-nic"><h5>NIC<span id="err-file-nic" style="color:red;">*</span></h5></label>
                    <input type="file" name="file-nic" class="form-control" id="file-nic" required>                    
                </div>
            </div>
        </div>    

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="file-birth-certificate"><h5>Birth Certificate <span id="err-file-birth-certificate" style="color:red;">*</span></h5></label>
                    <input type="file" name="file-birth-certificate" class="form-control" id="file-birth-certificate" required>                    
                </div>
            </div>
        </div>    

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="file-ol"><h5>G.C.E. O/L Certificate</h5></label>
                    <input type="file" name="file-ol" class="form-control" id="file-ol">                    
                </div>
            </div>
        </div>    

        <div class="card mt-4">
            <div class="card-body">
                <div class="form-group">
                    <label for="file-al"><h5>G.C.E. A/L Certificate</h5></label>
                    <input type="file" name="file-al" class="form-control" id="file-al">                    
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

<script>

    function validateProgram(){
        var program = document.getElementById("program").value;

        // Check
        if(program == "0"){
            document.getElementById("err-program").innerHTML = "Please select a program";
        }
        else{
            document.getElementById("err-program").innerHTML = "*";
        }
    }

    function validateNic(){
        var nic = document.getElementById("nic").value;

        // Check
        if(nic.length == 10 || nic.length == 14){
            document.getElementById("err-nic").innerHTML = "*";
        }
        else{
            document.getElementById("err-nic").innerHTML = "NIC length should be 10 or 14";
        }        
    }

    function validateNumber(){
        var number_p = /^[0-9]+$/;
        var number = document.getElementById("number").value;

        // Check
        if(number.length == 10){
            document.getElementById("err-number").innerHTML = "*";
        }
        else{
            document.getElementById("err-number").innerHTML = "Phone number should be 10 digit numeric numbers";
        }

        if(number.match(numbers_p)){
            document.getElementById("err-number").innerHTML = "*";
        }
        else{
            document.getElementById("err-number").innerHTML = "Phone number should be 10 digit numeric numbers";
        }        
    }

    function validateHEQ(){
        var selected = "";
        if (document.getElementById('r1').checked) {
            selected = document.getElementById('r1').value;
        }
        if (document.getElementById('r2').checked) {
            selected = document.getElementById('r2').value;
        }
        if (document.getElementById('r3').checked) {
            selected = document.getElementById('r3').value;
        }
        if (document.getElementById('r4').checked) {
            selected = document.getElementById('r4').value;
        }

        if(selected == "" || selected == null){
            document.getElementById("err-highest-education-qualifications").innerHTML = "Select an option";
        }
        else{
            document.getElementById("err-highest-education-qualifications").innerHTML = "*";
        }
    }

    function validate(){
        
        var numbers_p = /^[0-9]+$/;

        // var email = document.getElementById("email").value;
        // var name = document.getElementById("name").value;
        var program = document.getElementById("program").value;
        var nic = document.getElementById("nic").value;
        var number = document.getElementById("number").value;
        // var age = document.getElementById("age").value;
        // var district = document.getElementById("district").value;
        // var divisionalsecretariat = document.getElementById("divisional-secretariat").value;
        // var occupation = document.getElementById("occupation").value;
        // var workplace = document.getElementById("workplace").value;
        // var workplaceaddress = document.getElementById("workplace-address").value;
        // highest-education-qualifications
        var selected = "";
        if (document.getElementById('r1').checked) {
            selected = document.getElementById('r1').value;
        }
        if (document.getElementById('r2').checked) {
            selected = document.getElementById('r2').value;
        }
        if (document.getElementById('r3').checked) {
            selected = document.getElementById('r3').value;
        }
        if (document.getElementById('r4').checked) {
            selected = document.getElementById('r4').value;
        }
        var filenic = document.getElementById("file-nic").value;
        var filebirthcertificate = document.getElementById("file-birth-certificate").value;

        // Check
        if(program == "0"){
            document.getElementById("err-program").innerHTML = "Please select a program";
            return false;
        }
        else{
            document.getElementById("err-program").innerHTML = "*";
        }

        // Check
        if(nic.length == 10 || nic.length == 14){
            document.getElementById("err-nic").innerHTML = "*";
        }
        else{
            document.getElementById("err-nic").innerHTML = "NIC length should be 10 or 14";
            return false;
        }

        // Check
        if(number.length == 10){
            document.getElementById("err-number").innerHTML = "*";
        }
        else{
            document.getElementById("err-number").innerHTML = "Phone number should be 10 digit numeric numbers";
            return false
        }
        
        if(number.match(numbers_p)){
            document.getElementById("err-number").innerHTML = "*";
        }
        else{
            document.getElementById("err-number").innerHTML = "Phone number should be 10 digit numeric numbers";
            return false
        }

        // Check
        if(selected == "" || selected == null){
            document.getElementById("err-highest-education-qualifications").innerHTML = "Select an option";
            return false;
        }
        else{
            document.getElementById("err-highest-education-qualifications").innerHTML = "*";
        }

        return true;
    }

</script>