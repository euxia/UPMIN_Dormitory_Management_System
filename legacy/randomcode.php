<?php
                    if (isset($_POST["login"])) {
                        $studentnum = $_POST["studentnum"];
                        $password = $_POST["password"];
                        require_once "php/database.php";
                        $stmt = $conn->prepare("SELECT * FROM dormers WHERE studentnum = ?");
                        $stmt->bind_param('s', $studentnum);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();
                        if ($user) {
                            if ($password == 'upmin' && password_verify($password, $user['password'])) {
                                $_SESSION["valid"] = $user["studentnum"];
                                $_SESSION["user"] = $user;
                                header("Location: regis.php/" . $_SESSION["valid"]);
                                die();
                            } elseif (password_verify($password, $user["password"])) {
                                $_SESSION["valid"] = $user["studentnum"];
                                $_SESSION['user'] = $user;
                                header("Location: index.php/". $_SESSION["valid"]);
                                die();
                            } else {
                                echo "<div class='alert alert-danger'>Password does not match</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Student Number does not match</div>";
                        }
                    }
                ?>