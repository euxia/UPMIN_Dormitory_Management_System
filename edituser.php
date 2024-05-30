<?php
    session_start();
    include("php/database.php");
    // if (!isset($_SESSION["valid"])) {
    //     header("Location: login.php");
    // }
    $studentnum = urldecode($_GET['studentnum']);
    $stmt = $conn->prepare("SELECT * FROM dormers WHERE studentnum = ?");
    $stmt->bind_param("s", $studentnum);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (isset($_POST["edit"])) {
        $paymentmonth = $_POST["payment"];
        $majoroffense = $_POST["majoroffense"];
        $minoroffense = $_POST["minoroffense"];
        $permitfrom = $_POST["permitfrom"];
        $permitto = $_POST["permitto"];
        $studentnum = $_POST["studentnum"]; // assuming studentnum is passed in the form

        $payment = $paymentmonth * 500;

        $permit = $permitfrom . ' to ' . $permitto;

        // Fetch the current values from the database
        $result = $conn->query("SELECT * FROM dormers WHERE studentnum = '$studentnum'");
        $row = $result->fetch_assoc();
        $currentPayment = $row['payment'];
        $currentMajorOffense = $row['major_offense'];
        $currentMinorOffense = $row['minor_offense'];

        // Add the new values to the current values
        $newPayment = $currentPayment + $payment;

        // Assuming the major and minor offenses are integers
        $newMajorOffense = $currentMajorOffense + $majoroffense;
        $newMinorOffense = $currentMinorOffense + $minoroffense;
        

        $stmt = $conn->prepare("UPDATE dormers SET payment = ?, major_offense = ?, minor_offense = ?, permit= ? WHERE studentnum = ?");
        $stmt->bind_param("sssss", $newPayment, $newMajorOffense, $newMinorOffense, $permit, $studentnum);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Successfully updated dormer responsibilities!'); setTimeout(function(){ window.location.href = 'dashboard.php'; }, 2000);</script>";
        } else {
            echo "<script>alert('Failed to update dormer responsibilities!'); setTimeout(function(){ window.location.href = 'dashboard.php'; }, 2000);</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
        <title>Registration</title>
    </head>
<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100"> 

    <!----------------------- Registration Container -------------------------->

        <div class="border rounded-5 px-5 bg-white shadow">

    <!--------------------------- Registration Content----------------------------->
            
            <div class="header-text text-center my-3 mt-4 fs-2">Edit Dormer Responsibilities</div>
            <form action="edituser.php" method="post">
                <div class="row mb-3">
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6" placeholder="Student Number" value="<?php echo $row["name"]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="studentnum" class="form-control form-control-lg bg-light fs-6" placeholder="Student Number" value="<?php echo $row["studentnum"]; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Month(s) to pay:</span>
                            </div>
                            <input name="payment" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Major Offense</span>
                            </div>
                            <input name="majoroffense" type="number" class="form-control">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Minor Offense</span>
                            </div>
                            <input name="minoroffense" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Permit: valid from</span>
                            </div>
                            <input name="permitfrom" type="date" class="form-control">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">until</span>
                            </div>
                            <input name="permitto" type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-auto">
                        <button type="submit" name="edit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="col-md-auto">
                        <button type="button" class="btn btn-outline-dark">Back to Home</button>
                    </div>
                    <div class="col" name="output"></div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>