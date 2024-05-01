<?php
// check user logged in or not. if logged in it will go to home page
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["isLoggedIn"])) {
    if ($_SESSION["isLoggedIn"] == true) {
        header("location: thesis_list.php");
    }
}
?>

<!-- cdn for use bootstrap  -->
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .field-icon {
    float: right;
    margin-left: -25px;
    margin-top: 10px;
    position: relative;
    z-index: 2;
    }

</style>


<div class="container">
    <?php
    // after registration success or fail it will show message
    if(isset($_GET['success'])){
        if($_GET['success']=="true"){
            echo "<br/><div style='color: green' align='center' ><b>User added successfully</b></div>";
        }
        else if($_GET['success']=="false"){
            echo "<br/><div style='color: red' align='center'><b>Error to user add !!!</b></div>";
        }
    }
    ?>
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div style="display:flex;justify-content: center;">
            <img style="height:150px;width:150px" src="image/logo.png">
        </div><br/>
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
            </div>

            <div style="padding-top:30px" class="panel-body" >

                <?php
                        $isErr = FILTER_INPUT(INPUT_GET, 'err', FILTER_SANITIZE_STRING);
                        if($isErr == 1){
                           echo "<div  id='login-alert' class='alert alert-danger col-sm-12'>Bad Credential!</div>";
                        }
                    ?>
            

                <form id="loginform" class="form-horizontal" role="form" method="POST" action="loginCheck.php" >

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password"/>
                        <span toggle="#login-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    

                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <input type="submit" name="login" value="Sign in" class="btn btn-success"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                                <a href="registration.php">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>


</div>

<script>
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
    });
</script>