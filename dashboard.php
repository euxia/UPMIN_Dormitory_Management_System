<?php
    session_start();
    include "php/database.php";
    // if (!isset($_SESSION["valid"])) {
    //     header("Location: login.php");
    // }
    function getTableRows($conn, $studentnum = null) {
        ob_start();
    
        if ($studentnum) {
            $stmt = $conn->prepare("SELECT * FROM dormers WHERE studentnum = ?");
            $stmt->bind_param("s", $studentnum);
            $stmt->execute();
            $result = $stmt->get_result();
        } else {
            $result = $conn->query("SELECT * FROM dormers");
        }

        while ($row = $result->fetch_assoc()) {
            echo '<tr class="highlight">';
            echo '<td>' . htmlspecialchars($row['studentnum']) . '</td>';
            echo '<td>' . htmlspecialchars($row['name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['age']) . '</td>';
            echo '<td>' . htmlspecialchars($row['sex']) . '</td>';
            echo '<td>' . htmlspecialchars($row['course']) . '</td>';
            echo '<td>' . htmlspecialchars($row['yearlvl']) . '</td>';
            echo '<td>' . htmlspecialchars($row['birthdate']) . '</td>';
            echo '<td>' . htmlspecialchars($row['placeofbirth']) . '</td>';
            echo '<td>' . htmlspecialchars($row['religion']) . '</td>';
            echo '<td>' . htmlspecialchars($row['emailadd']) . '</td>';
            echo '<td>' . htmlspecialchars($row['phonenum']) . '</td>';
            echo '<td>' . htmlspecialchars($row['address']) . '</td>';
            echo '<td>' . htmlspecialchars($row['payment']) . '</td>';
            echo '<td>' . htmlspecialchars($row['minor_offense']) . '</td>';
            echo '<td>' . htmlspecialchars($row['major_offense']) . '</td>';
            echo '<td>' . htmlspecialchars($row['permit']) . '</td>';
            echo '<td>';
            echo '<a href="edituser.php?studentnum=' . urlencode($row['studentnum']) . '" class="btn btn-primary btn-sm"><i class="lni lni-pencil-alt"></i></a>';
            echo '<button type="button" class="btn btn-danger delete-action btn-sm" onclick="deleteStudent(\'' . $row['studentnum'] . '\')"><i class="lni lni-trash-can"></i></button>';
            echo '</td>';
            echo '</tr>';
        }
        return ob_get_clean();
    }
    if (isset($_POST['search'])) {
        $studentnum = $_POST['studentnum'];
        $tableRows = getTableRows($conn, $studentnum);
    } else {
        $tableRows = getTableRows($conn);
    }

    function deleteStudent($conn, $studentnum) {
        $stmt = $conn->prepare("DELETE FROM dormers WHERE studentnum = ?");
        $stmt->bind_param("s", $studentnum);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    if (isset($_POST['delete'])) {
        $studentnum = $_POST['studentnum'];
    
        if (deleteStudent($conn, $studentnum)) {
            echo "success";
        } else {
            echo "failure";
        }
        exit(); // stop further execution, very important
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex mt-4">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">UPMin Dormitory Management System</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Admin</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admin.php" class="sidebar-link">
                        <i class="lni lni-plus"></i>
                        <span>Add Dormer</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="row justify-content-between">
                            <div class="col-4">
                                <h3 class="fw-bold fs-4 mb-1">Admin Dashboard</h3>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="dashboard.php">
                                    <div class="input-group">
                                        <input type="text" name="studentnum" class="form-control" placeholder="Search Student number" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button name="search" class="btn btn-outline-secondary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <h3 class="fw-bold fs-4 my-3">EBL Dormers</h3>
                        <div class="row">
                            <div class="col-12">
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped" style="min-width: 200vw;">
                                        <thead>
                                            <tr class="highlight">
                                                <th scope="col">Student Number</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Sex</th>
                                                <th scope="col">Course</th>
                                                <th scope="col">Year Level</th>
                                                <th scope="col">Birthdate</th>
                                                <th scope="col">Place of Birth</th>
                                                <th scope="col">Religion</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Payment (PHP)</th>
                                                <th scope="col">Minor Offense</th>
                                                <th scope="col">Major Offense</th>
                                                <th scope="col">Permit</th>
                                                <th scope="col">Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $tableRows; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Dormer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to evict this dormer with student number <span id="studentnumPlaceholder"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger" id="confirmDelete">Delete</a>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var studentnum = button.getAttribute('data-bs-studentnum');
            document.getElementById('confirmDelete').href = href;
            document.getElementById('studentnumPlaceholder').textContent = studentnum;
        });
        function deleteStudent(studentnum) {
            // Get the delete modal
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

            // Set the student number in the modal
            document.getElementById('studentnumPlaceholder').textContent = studentnum;

            // Show the modal
            deleteModal.show();
        }
        document.getElementById('confirmDelete').addEventListener('click', function() {
            var studentnum = document.getElementById('studentnumPlaceholder').textContent;

            $.ajax({
                url: 'dashboard.php',
                type: 'POST',
                data: {
                    'delete': 1,
                    'studentnum': studentnum
                },
                success: function(response) {
                    if(response == 'success') {
                        alert('Student deleted successfully');
                        location.reload(); // reload the page to see the changes
                    } else {
                        alert('Failed to delete student');
                    }
                }
            });
        });
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</html>