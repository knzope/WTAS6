<!DOCTYPE html>
    <head>
        <title>CRUD operations</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <style>
            .c1{
                border: 1px solid rgba(0, 0, 0, 0.219);
                padding: 20px;
                margin-top: 50px;
                border-radius: 5px;
            }
            .c1:hover{
                box-shadow: 0px 0px 10px 0.5px rgba(0, 0, 0, 0.521);
            }
            </style>
    </head>
    <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Update</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Delete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                </ul>
                
            </div>
            </nav>

            <div class="container">
            <h2 class="text-center" style="margin-bottom:-30px;margin-top: 20px;">Registration Form</h2>
            <div class="col-lg-6 m-auto d-block">
                <div class="c1">
                    <div class="text-success" id="temp"></div>
                        <div class="text-danger" id="temp1"></div>
        <form id="form_register" >
            <div class="form-group">
                <lable for="fname">First Name : </lable> <br>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required autofocus>
                <span id="alt1" class="text-danger font-weight-bold"> </span> 
            </div>
            <div class="form-group">
                <lable for="lname">Last Name : </lable> <br>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required> 
            <span id="alt2" class="text-danger font-weight-bold"> </span>
            </div>

            <div class="form-group">
                <lable for="lname">Username : </lable> <br>
            <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required> 
            <span id="alt3" class="text-danger font-weight-bold"> </span>
            </div>
            
            <div class="form-group">
                <lable for="email">Email Address : </lable> <br>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            <span id="alt4" class="text-danger font-weight-bold"> </span> 
            </div>
            
            <div class="form-group">
                <lable for="phone">Phone No. : </lable> <br>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No." required>
            <p id="alt5" class="text-danger font-weight-bold"> </p> 
            </div>
            

            <input type="button" class="btn btn-primary" value="Submit" onclick="return initial1()"> <br>
        </form>
        </div>
        </div>
        </div>

        <script src="jquery-3.5.1.min.js"></script>
        <script>
            let base_url = "handler.php";
            function initial1()
            {
                document.getElementById("temp").innerHTML="";
                document.getElementById("temp1").innerHTML="";
                var fname,lname,uname,d,phone;
                fname=document.getElementById("fname").value;
                lname=document.getElementById("lname").value;
                uname=document.getElementById("uname").value;
                d=document.getElementById("email").value;
                phone=document.getElementById("phone").value;


                if(fname == ""){
				document.getElementById('alt1').innerHTML =" **Please fill the first Name field";
				return false;
                }
                else if((fname.length <= 2) || (fname.length > 15)) {
                    document.getElementById('alt1').innerHTML =" **First Name length must be between 2 and 15";
                    return false;
                }
                else if(!isNaN(fname)){
                    document.getElementById('alt1').innerHTML =" **only characters are allowed";
                    return false;
                }
                else{
                    document.getElementById('alt1').innerHTML ="";
                }
                if(lname == ""){
                    document.getElementById('alt2').innerHTML =" **Please fill the Last Name field";
                    return false;
                }
                else if((lname.length <= 2) || (lname.length > 15)) {
                    document.getElementById('alt2').innerHTML =" **Last Name length must be between 2 and 15";
                    return false;
                }
                else if(!isNaN(lname)){
                    document.getElementById('alt2').innerHTML =" **only characters are allowed";
                    return false;
                }
                else{
                    document.getElementById('alt2').innerHTML ="";
                }

                if(uname == ""){
                    document.getElementById('alt3').innerHTML =" **Please fill the User Name field";
                    return false;
                }
                else if((uname.length <= 2) || (uname.length > 20)) {
                    document.getElementById('alt3').innerHTML =" **User Name length must be between 2 and 20";
                    return false;
                }
                else{
                    document.getElementById('alt3').innerHTML ="";
                }

                var at="@"
                var dot="."
                var lat=d.indexOf(at)
                var lstr=d.length
                var ldot=d.indexOf(dot)
                if(d == "")
                {
                    document.getElementById('alt4').innerHTML ="**Please enter E-mail ID";
                    return false;
                }
                if (d.indexOf(at)==-1){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.indexOf(at)==-1 || d.indexOf(at)==0 || d.indexOf(at)==lstr){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.indexOf(dot)==-1 || d.indexOf(dot)==0 || d.indexOf(dot)==lstr){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.indexOf(at,(lat+1))!=-1){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.substring(lat-1,lat)==dot || d.substring(lat+1,lat+2)==dot){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.indexOf(dot,(lat+2))==-1){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else if (d.indexOf(" ")!=-1){
                    document.getElementById('alt4').innerHTML ="**Invalid E-mail ID";
                    return false;
                }
                else
                {
                    document.getElementById('alt4').innerHTML ="";
                }


                if(phone == ""){
                    document.getElementById('alt5').innerHTML =" **Please fill the Mobile Number field";
                    return false;
                }
                if(isNaN(phone)){
                    document.getElementById('alt5').innerHTML =" **User must write digits only not characters";
                    return false;
                }
                if(phone.length!=10){
                    document.getElementById('alt5').innerHTML =" **Mobile Number must be 10 digits only";
                    return false;
                }
                else if(phone==0000000000)
                {
                    document.getElementById('alt5').innerHTML =" **Mobile Number must be 10 digits only";
                    return false;
                }
                else{
                    document.getElementById('alt5').innerHTML ="";
                }
                
                
                // let url1 = base_url + "?req=check_uname&uname="+uname; 
                // $.get(url1,function(data,success){
                //     if(data=="Username is selected by another user.")
                //     {
                //         document.getElementById("alt3").innerHTML=data;
                //         return false;
                //     }
                //     else
                //     {
                        
                //     }
                // });
                var test1;
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=check_uname&uname="+uname,
                    success: function(msg1){
                        
                        test1=msg1;
                    }
                });
                if(test1=="Username is selected by another user.")
                    {
                        
                        document.getElementById("alt3").innerHTML=test1;
                        return false;
                    }
                    else
                    {   
                        document.getElementById("alt4").innerHTML="";
                    }
                // let url2 = base_url + "?req=check_email&email="+d; 
                //         $.get(url2,function(data1,success){
                //             if(data1=="Email is already registered.")
                //             {
                //                 document.getElementById("alt4").innerHTML=data1;
                //                 return false;
                //             }
                //             else
                //             {
                                
                //             }   
                //         });

                var test2;
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=check_email&email="+d,
                    success: function(msg2){
                        
                        test2=msg2;
                    }
                });
                if(test2=="Email is already registered.")
                    {
                        
                        document.getElementById("alt4").innerHTML=test2;
                        return false;
                    }
                    else
                    {   
                        document.getElementById("alt4").innerHTML="";
                    }
                // let url3 = base_url + "?req=check_phone&phone="+phone; 
            
                // $.get(url3,function(data2,success){
                //     if(data2=="Phone is already registered.")
                //     {
                //         valid=0;
                //         document.getElementById("alt5").innerHTML=data2;
                //     }
                //     else
                //     {   
                //         valid=1;
                //     }   
                
                // });
                var test3;
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=check_phone&phone="+phone,
                    success: function(msg3){
                        
                        test3=msg3;
                    }
                });
                if(test3=="Phone is already registered.")
                    {
                        
                        document.getElementById("alt5").innerHTML=test3;
                        return false;
                    }
                    else
                    {   
                        document.getElementById("alt5").innerHTML="";
                    }   
                var k={fname: fname, lname: lname, uname: uname , email: d, phone: phone};
                        var k = JSON.stringify(k);
                        add_user(k);
                        document.getElementById("form_register").reset();
                
                
                
                
                
               
                
                
                
            }

            function add_user(k){
                let url = base_url + "?req=add&object="+k; 
                $.get(url,function(data,success){
                    if(data=="Form successfully submitted")
                    {
                        document.getElementById("temp").innerHTML=data;
                    }
                    else
                    {
                        document.getElementById("temp1").innerHTML=data;
                    }
                    
                });
            }


            

            

            

            
            </script>
    </body>
</html>
