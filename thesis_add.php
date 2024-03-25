<?php
include "menu.php";
include 'connect.php';
include "thesis.php";

// logged in user name
    $loggedInUser = $_SESSION["username"];
    $role = $_SESSION["role"];
        // create table for show all data
?>
    <!-- <div style='width: 45% ; margin: auto; padding-left: 2%; padding-right: 2%; border: 1px solid gray' >
        <h3>Add Thesis</h3><br/> 
        <div align="left"><br/>
            <form method="POST" id="thesis_upload" name="thesis_upload" action="thesis_upload.php" enctype="multipart/form-data">
                <label>Title : </label><input class="form-control" name="title" id="title" required/><br/>
                <label>Abstract : </label><textarea class="form-control" rows="4" name="abstract" style="width: 100%;" required ></textarea><br/><br/>
                <input class="form-control" type="file" id="fileToUpload" name="fileToUpload"><br/><br/>
                <button type="submit" class="btn btn-primary btn-block"  name="thesis_upload" id="thesis_upload" >Upload</button> <br/><br/>
            </form>
        </div>
        <hr/>
    </div> -->

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #152733;
    overflow: hidden;
}
.main-banner{
    border-bottom: none !important;
}
.form-holder {
    width: 100% !important;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      /* min-height: 100vh; */
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #fff;
}

.form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}

    </style>




    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add Thesis</h3>
                        <form class="requires-validation" method="POST" id="thesis_upload" name="thesis_upload" action="thesis_upload.php" enctype="multipart/form-data">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="title" placeholder="Title" required>
                               <div class="invalid-feedback">Title cannot be blank!</div>
                            </div><br/>

                            <div class="col-md-12">
                                <textarea class="form-control" type="text" name="abstract" placeholder="Abstract" required></textarea>
                                 <div class="invalid-feedback">Abstract cannot be blank!</div>
                            </div><br/>

                           
                           <div class="col-md-12">
                              <input class="form-control" type="file" id="fileToUpload" name="fileToUpload" placeholder="File" required>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>   <br/>
                            <div class="form-button mt-3">
                                <button type="submit" class="btn btn-primary" name="thesis_upload" id="thesis_upload">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




  

<!-- <script type="text/javascript">
    function commnetClick(strId) {
        var filedName = "strId_" + strId;
        var storyId = $("#" + filedName).val();
        window.location.href = "story_details.php?strId=" + storyId;
    }

    // $('#story_upload').click(function () {
    //     $( "#myForm" ).submit();
    //     window.location.href = "index.php";
    // });
</script> -->