<?php
    // session_start();
    // include("php/database.php");
    // if(!isset($_SESSION['valid'])){
    //     header("Location: login.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <title>Registration</title>
    </head>
<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100"> 

    <!----------------------- Registration Container -------------------------->

        <div class="border rounded-5 px-5 bg-white shadow box-area h-70">

    <!--------------------------- Registration Content----------------------------->
            
            <?php
                ob_start();

                if (isset($_POST["regis"])) {
                    $password = $_POST["password"];
                    $confirmpass = $_POST["confirmpass"];
                    $name = $_POST["name"];
                    $age = $_POST["age"];
                    $sex = $_POST["sex"];
                    $course = $_POST["course"];
                    $yearlvl = $_POST["yearlvl"];
                    $birthdate = $_POST["birthdate"];
                    $placeofbirth = $_POST["placeofbirth"];
                    $religion = $_POST["religion"];
                    $emailadd = $_POST["emailadd"];
                    $phonenum = $_POST["phonenum"];
                    $address = $_POST["address"];
                
                    $studentnum = $_SESSION["user"]["studentnum"];
                    // Check if password and confirm password are the same
                    if ($password !== $confirmpass) {
                        echo "<div class='alert alert-danger fs-6'>Password do not match.</div>";
                    } else {
                        // Assuming $conn is a PDO connection
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("UPDATE dormers SET password = ?, name = ?, age = ?, sex = ?, course = ?, yearlvl = ?, birthdate = ?, placeofbirth = ?, religion = ?, emailadd = ?, phonenum = ?, address = ? WHERE studentnum = ?");
                        $stmt->bind_param('ssissssssssss', $password, $name, $age, $sex, $course, $yearlvl, $birthdate, $placeofbirth, $religion, $emailadd, $phonenum, $address, $studentnum);
                        $stmt->execute();
                        header("Location: login.php");
                        echo "<div class='alert alert-success fs-6'>Registration Succesful!</div>";
                    }
                }
                $output = ob_get_clean();  // Get the contents of the output buffer
                $_SESSION['output'] = $output;  // Store the output in a session variable
            ?>
            <div class="header-text text-center my-3 mt-4 fs-2">Registration</div>
            <form action="regis.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Name">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="age" class="form-control form-control-lg bg-light fs-6" placeholder="Age">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="sex" class="form-control form-control-lg bg-light fs-6" placeholder="Sex">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md">
                        <div class="input-group">
                            <input type="text" name="studentnum" class="form-control form-control-lg bg-light fs-6" placeholder="Student Number" value="<?php echo $_SESSION["user"]["studentnum"]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="course"  class="form-control form-control-lg bg-light fs-6" aria-label="Text input with dropdown button" placeholder="Course">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">BS Anthropology</a></li>
                                <li><a class="dropdown-item" href="#">BS Architecture</a></li>
                                <li><a class="dropdown-item" href="#">BA Communication and Media Arts</a></li>
                                <li><a class="dropdown-item" href="#">BA English</a></li>
                                <li><a class="dropdown-item" href="#">Diploma in Exercise and Sports Science</a></li>
                                <li><a class="dropdown-item" href="#">Diploma/Master in Urban and Regional Planning</a></li>
                                <li><a class="dropdown-item" href="#">Bachelor of Sports Science</a></li>
                                <li><a class="dropdown-item" href="#">Associate in Arts in Sports Studies</a></li>
                                <li><a class="dropdown-item" href="#">MS Human Movement Science</a></li>
                                <li><a class="dropdown-item" href="#">BS Applied Mathematics</a></li>
                                <li><a class="dropdown-item" href="#">BS Biology</a></li>
                                <li><a class="dropdown-item" href="#">BS Computer Science</a></li>
                                <li><a class="dropdown-item" href="#">BS Food Technology</a></li>
                                <li><a class="dropdown-item" href="#">MS Food Science</a></li>
                                <li><a class="dropdown-item" href="#">BS Data Science</a></li>
                                <li><a class="dropdown-item" href="#">BS Agribusiness Economics</a></li>
                                <li><a class="dropdown-item" href="#">Master in Management</a></li>
                                <li><a class="dropdown-item" href="#">PhD by Research</a></li>
                                <li><a class="dropdown-item" href="#">Professor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="yearlvl" class="form-control form-control-lg bg-light fs-6 " aria-label="Text input with dropdown button" placeholder="Year Level">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">1st Year</a></li>
                                <li><a class="dropdown-item" href="#">2nd Year</a></li>
                                <li><a class="dropdown-item" href="#">3rd Year</a></li>
                                <li><a class="dropdown-item" href="#">4rd Year</a></li>
                                <li><a class="dropdown-item" href="#">N/A</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon">Birth Date</span>
                            <input type="date" name="birthdate"  class="form-control form-control-lg bg-light fs-6" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" name="placeofbirth" class="form-control form-control-lg bg-light fs-6" placeholder="Place of Birth">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <input type="text" name="religion" class="form-control form-control-lg bg-light fs-6" placeholder="Religion">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-7">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping">@</span>
                            <input type="text" name="emailadd" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text" id="addon-wrapping">+63</span>
                            <input type="text" name="phonenum" class="form-control form-control-lg bg-light fs-6" placeholder="Contact Number">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <input type="text" name="address" class="form-control form-control-lg bg-light fs-6" placeholder="Home Address">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-5">
                        <div class="input-group">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Change Password">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <input type="password" name="confirmpass" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-auto">
                        <button type="submit" name="regis" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-outline-dark">Back to Home</button>
                    </div>
                    <div class="col" name="output"></div>
                </div>
            </form>
        </div>
    </div>
    <script>
        <?php if(isset($_SESSION['output'])): ?>
        document.querySelector('div[name="output"]').innerHTML = "<?php echo $_SESSION['output']; ?>";
            <?php unset($_SESSION['output']); ?>
        <?php endif; ?>
        $(".dropdown-menu .dropdown-item").on("click", function() {
            $(this).closest('.input-group').find('input').val($(this).text());
        });
    </script>
</body>
</html>