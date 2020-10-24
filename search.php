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
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">Delete</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="search.php">Search</a>
                </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
            </nav>
            <div class="container" id="i1">
              <form class="form-inline my-2 my-lg-0 justify-content-sm-center">
                <input class="form-control mr-sm-2" id="search1" type="text" placeholder="Search Username">
                <!-- <input type="button" class="btn btn-secondary my-2 my-sm-0" id="search2" onclick="return initial()" value="Search"> -->
                </form>
            </div>
            <div class="container-fluid">
                
                <div id="demo"></div>
                <div class="text-danger" id="demo1"></div>
                
            
            </div>
            <div class="container" id="i2"></div>
        <script src="jquery-3.5.1.min.js"></script>
            <script>
              let base_url = "handler.php";
            $(document).ready(function(){
                document.getElementById("demo").innerHTML="";
                document.getElementById("demo1").innerHTML="";
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=get_all_uname",
                    success: function(data){
                        if(data.length == 0)
                        {
                            document.getElementById("i2").style.display="none";
                            document.getElementById("demo").innerHTML="<h3><div class='container text-center'>Nobody registered.</div></h3>";
                        }
                        else{
                            document.getElementById("i2").style.display="block";
                            var text;
                            text="";
                            for(i=0;i<data.length;i++)
                            {
                                text=text+ "<table id='table' class='table table-hover table-bordered'>";
                                text=text+  "<tr><th>First Name</th><td id='fname'>"+data[i].fname+"</td></tr>";
                                text=text+  "<tr><th>Last Name</th><td id='lname'>"+data[i].lname+"</td></tr>";
                                text=text+  "<tr><th>Username</th><td id='uname'>"+data[i].uname+"</td></tr>";
                                text=text+  "<tr><th>Email</th><td id='email'>"+data[i].email+"</td></tr>";
                                text=text+  "<tr><th>Phone</th><td id='phone'>"+data[i].phone+"</td></tr></table>";
                            }
                            document.getElementById("i2").innerHTML = text;
                        }
                        
                    }
                });
            });
            $(document).ready(function(){
                $("#search1").on("keyup", function() {
                document.getElementById("demo").innerHTML="";
                document.getElementById("demo1").innerHTML="";
                var i=document.getElementById("search1").value;
                $.ajax({
                    type:"GET",
                    async:false,
                    url:base_url + "?req=search_uname&uname="+i,
                    success: function(data){
                        if(data.length == 0)
                        {
                            document.getElementById("i2").style.display="none";
                            document.getElementById("demo1").innerHTML="<h3><div class='container text-center'>No results.</div></h3>";
                        }
                        else{
                            document.getElementById("i2").style.display="block";
                            var text;
                            text="";
                            for(i=0;i<data.length;i++)
                            {
                                text=text+ "<table id='table' class='table table-hover table-bordered'>";
                                text=text+  "<tr><th>First Name</th><td id='fname'>"+data[i].fname+"</td></tr>";
                                text=text+  "<tr><th>Last Name</th><td id='lname'>"+data[i].lname+"</td></tr>";
                                text=text+  "<tr><th>Username</th><td id='uname'>"+data[i].uname+"</td></tr>";
                                text=text+  "<tr><th>Email</th><td id='email'>"+data[i].email+"</td></tr>";
                                text=text+  "<tr><th>Phone</th><td id='phone'>"+data[i].phone+"</td></tr></table>";
                            }
                            document.getElementById("i2").innerHTML = text;
                        }
                        
                    }
                });
                });
                });
        </script>
    </body>
</html>
