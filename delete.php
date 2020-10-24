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
             #i1{
                margin-top: 10px;
            }
            
            #i2{
                display: none;
                align-items: center;
                justify-content: center; 
                padding: 40px 40px;
                margin-top: -30px;
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php">Update</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="delete.php">Delete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                </ul>
                
            </div>
            </nav>
            <div class="container" id="i1">
              <form class="form-inline my-2 my-lg-0 justify-content-sm-center">
                <input class="form-control mr-sm-2" id="search1" type="text" placeholder="Enter Username">
                <input type="button" class="btn btn-secondary my-2 my-sm-0" id="search2" onclick="return initial()" value="Search">
                </form>
            </div>
            <div class="container-fluid">
                
                <div class="text-success" id="demo"></div>
                <div class="text-danger" id="demo1"></div>
                
            
            </div>
            <div class="container" id="i2">
            <table id="table" class="table table-hover">
            <tr>
              <th>First Name</th>
              <td id="fname"></td>
            </tr>
            <tr>
              <th>Last Name</th>
              <td id="lname"></td>
            </tr>
            <tr>
              <th>Username</th>
              <td id="uname"></td>
            </tr>
            <tr>
              <th>Email</th>
              <td id="email"></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td id="phone"></td>
            </tr>
            
          </table>
          <input type="button" class="btn btn-danger" value="Delete" onclick="initial1()">
          <input type="button" class="btn btn-success" value="Cancel" onclick="window.location.href='delete.php'">
        </div>
            
            <script src="jquery-3.5.1.min.js"></script>
            <script>
              let base_url = "handler.php";
              var check_uname;
            function initial(){
                document.getElementById("demo").innerHTML="";
                document.getElementById("demo1").innerHTML="";
                var i=document.getElementById("search1").value;
                check_uname=i;
                if(i=="")
                {
                    document.getElementById("demo1").innerHTML="<h3><div class='container text-center'>Enter username first</div></h3>"
                    return false;
                }
                
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=get_uname&uname="+i,
                    success: function(data){
                        if(data.length == 0)
                        {
                            document.getElementById("demo1").innerHTML="<h3><div class='container text-center'>Username not found.</div></h3>";
                        }
                        else{
                            
                            for(i=0;i<data.length;i++)
                            {
                              document.querySelector("#fname").textContent = data[i].fname;
                              document.querySelector("#lname").textContent = data[i].lname;
                              document.querySelector("#uname").textContent = data[i].uname;
                              document.querySelector("#email").textContent = data[i].email;
                              document.querySelector("#phone").textContent = data[i].phone;
                              
                            }
                            document.getElementById("i2").style.display = "block";
                        }
                        
                    }
                });
               
            };
            function initial1(){
              let url = base_url + "?req=delete&uname="+check_uname; 
                $.get(url,function(data,success){
                    if(data=="Deleted Successfully.")
                    {
                        document.getElementById("demo").innerHTML="<h3><div class='container text-center'>Deleted Successfully.</div></h3>";
                    }
                    else
                    {
                        document.getElementById("demo1").innerHTML="<h3><div class='container text-center'>Error occurred while deleting information. Please try again later.</div></h3>";
                    }
                    
                });
                document.getElementById("search1").value="";
                      document.getElementById("i2").style.display = "none";
            }
              </script>
    </body>
</html>
