<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<body>
<div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
    <div style="display:flex;justify-content: center;">
            <img style="height:150px;width:150px" src="image/logo.png">
        </div><br/>   
    <div class="panel panel-primary">
            <div class="panel-heading">Enter Your Details Here
            </div>
            <div class="panel-body">
                <form name="myform" action="userRegInsert.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input id="first_name" name="first_name" class="form-control" type="text" required>
                        <span id="error_first_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input id="last_name" name="last_name" class="form-control" type="text" required>
                        <span id="error_last_name" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input id="email" name="email" class="form-control" type="email" required>
                        <span id="error_email" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                        <span id="error_phone" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username *</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                        <span id="error_username" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <span id="error_password" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="fileToUpload">Profile Image *</label>
                        <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" required>
                        <span id="error_fileToUpload" class="text-danger"></span>
                    </div>

                    <input type="submit" value="Registration" class="btn btn-primary center"/>

                    <br/><br/>
                    <div class="form-group">
                        Already have an account!
                        <a href="login.php">
                            Login Here
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</body>


<script type="text/javascript">

    // password validation
    $("#password").change(function () {
        var v = $("#password").val().length;
        ct = 0;
        nt = 0;
        cap = $("#password").val();

        for (i = 0; i < v; i++) {
            if ((cap[i] >= 'A' && cap[i] <= 'Z') || (cap[i] >= 'a' && cap[i] <= 'z')) {
                ct = 1;
                break;
            }
        }


        for (i = 0; i < v; i++) {
            if (cap[i] >= '1' && cap[i] <= '9') {
                nt = 1;
                break;
            }
        }
        if (v >= 8) {
            if (ct == 1 && nt == 1) {
                $("#error_password").html("OK");
                $("#error_password").css("color", "green");
            }
            else {
                $("#error_password").html("Character And Number Required");
                $("#error_password").css("color", "red");
            }

        }


        else {
            $("#error_password").html("must be atleast 8 chararcter");
            $("#error_password").css("color", "red");
        }
    });


    // username validation
    $("#username").change(function () {
        var username = $("#username").val();
            fetch("check_username.php?user="+username, {credentials: 'include'})
                .then(response => response.text()) // retrieves the response text
                .then(success); // calls the success function

    });

    // username error show
    function success(text) {
        $("#error_username").html(text);
    }
</script>