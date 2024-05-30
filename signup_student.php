<?php 
    require_once "includes/config_session.inc.php";
    require_once "includes/signup_student/signup_student_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100"> 

    <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center left-box" style="background: maroon;">
            <div class="featured-image mb-3">
                <img src="img/oble.webp" class="img-fluid" style="width: 250px;">
            </div>
        </div>

    <!-------------------- ------ Right Box ---------------------------->
        
        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-3">
                    <h2>UPMin Dormitory Management System</h2>
                    <p>Add Student to the dormitory.</p>
                </div>
                <?php
                    check_login_errors();
                ?>
                <form action="includes/signup_student/signup_student.inc.php" method="post">
                    <div class="input-group mb-2">
                        <input type="text" name="student_num" class="form-control form-control-lg bg-light fs-5 mb-3" placeholder="Student Number">
                    </div>
                    <div class="input-group mb-4">
                        <button name="add_user" class="btn btn-sm btn-outline-success w-100 fs-6 mb-2 ">Add to Server</button>
                        <button class="btn btn-outline-dark w-100 fs-6 btn-sm">Back to Home</button>
                    </div>
                </form>
            </div>
        </div> 
        </div>
    </div>
</body>
</html>