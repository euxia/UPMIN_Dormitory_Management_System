<?php
    session_start();
    include("php/database.php");
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }
    $studentnum = isset($_SESSION["user"]["studentnum"]) ? $_SESSION["user"]["studentnum"] : '';
    $name = isset($_SESSION["user"]["name"]) ? $_SESSION["user"]["name"] : '';
    $course = isset($_SESSION["user"]["course"]) ? $_SESSION["user"]["course"] : '';
    $yearlvl = isset($_SESSION["user"]["yearlvl"]) ? $_SESSION["user"]["yearlvl"] : '';
    $payment = isset($_SESSION["user"]["payment"]) ? $_SESSION["user"]["payment"] : '';
    $majoroffense = isset($_SESSION["user"]["major_offense"]) ? $_SESSION["user"]["major_offense"] : '';
    $minoroffense = isset($_SESSION["user"]["minor_offense"]) ? $_SESSION["user"]["minor_offense"] : '';
    $permit = isset($_SESSION["user"]["permit"]) ? $_SESSION["user"]["permit"] : '';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link href="landing.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <script defer src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <div id="logobar">
                <a href="#" class="upLogo"><img src="images/UP Logo.png" alt="UP Logo" class="logoImage"></a>
                <a href="#" class="upLogo"><img src="images/UP Min Logo.png" alt="UP Logo" class="logoImage"></a>
                <a href="#" class="uniName">University of The Philippines</a>            
            </div>
        </header>
        <div class="navbar">
            <h1> UPMin Dormitory Management System </h1>
            <div class="dropdown">
                <a href="#"><i class="fas fa-link"></i>Quick Links</a>
                <div class="dropdown-content">
                    <a href="https://student.upmin.edu.ph/index.php?go=login" target="_blank">CSRS</a>
                    <a href="https://canvas.upd.edu.ph/" target="_blank">Canvas</a>
                </div>
            </div>
        </div>
        <input type="checkbox" id="slideToggle">
        <label for="slideToggle" class="toggleSlideBar">
            <span class="topLine common"></span>
            <span class="middleLine common"></span>
            <span class="bottomLine common"></span>
        </label>

        <div class="slidebar">
            <h1>Dashboard</h1>
            <ul>
                <li><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href= "#About" ><i class="fa-solid fa-circle-info"></i>About</a></li>
                <li><a href="#" id="profileLink" onclick="dormerModal()"><i class="fas fa-user"></i>Profile</a></li>
            </ul>

            <div class="sliderBottomIcons">
                <!-- Changed here -->
                <a href="#"><i class="fa-solid fa-right-from-bracket delete-action"></i>Log-Out </a>
            </div>
        </div>

        <section class="landing">
            <div class="landingPic">
                <img src="images/ebl-dormitory.jpg" alt="Elias B. Lopez Dormitory">
                <div class="landingContent">
                    <p>Welcome to</p>
                    <h1>UPMIN Dormitory Management System</h1>
                    <button id="Button">Log In</button>   
                </div>
                <div class="gradient"></div>
            </div>
        </section>

        <section class="greetings">    
            <div class="content">
                <h1>Greetings!!!</h1>
                <p> Welcome to the UPMin Dormitory Management System, your central hub for seamless dormitory living. Our platform is designed to streamline your dormitory experience, making administrative tasks a breeze and ensuring your stay is hassle-free. 
                    At UPMin Dormitory Management System, we're passionate about creating a better living environment for students. Our dedicated team works tirelessly to develop innovative solutions that simplify dormitory management, prioritize user experience, and promote sustainability. Join us as we redefine the standards of student housing management.
                </p>
            </div>
            <div class="pic-container">
                <img src="images/Oble.jpg">
            </div>
        </section>

        <section class="values">
            <div class="mission-container">
                <h1> Mission </h1>
                <p> To provide a convenient and efficient online platform for dormitory residents at UPMin to manage their information securely, fostering a seamless administrative process and enhancing overall dormitory experience. </p>
            </div>
            <div class="vision-container">
                <h1> Vision </h1>
                <p> To become the premier digital solution for dormitory management at UPMin, revolutionizing the way residents access and update their information while promoting sustainability and environmental responsibility through paperless operations.</p>
            </div>
            <div class="goal-container">
                <h1> Goals </h1>
                <p>Our aim for UPMin Dormitory Management System: simplify tasks, enhance user experience, ensure data security, and promote sustainability. We strive to redefine efficiency and convenience in student housing by streamlining processes, improving interfaces, implementing security measures, and encouraging feedback.</p>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <div class="contents-wraper">
                    <section class="header"><h1>"What the dormers say?"</h1></section>
                    <section class="testRow">
                        
                        <div class="testItem active">
                            <img src="images/Deniel.png">
                            <h3>Deniel Dave Natividad</h3>
                            <h4>1st-Year BSCS</h4>
                            <p>“The EBL Dorm is very accomodating. I am strong. RESPECT THE GRIND”</p>
                        </div>
            
                        <div class="testItem">
                            <img src="images/Ceballos.jpg">
                            <h3>Cristieneil Ceballos</h3>
                            <h4>1st-Year BSCS</h4>
                            <p>“I recommend EBL to students who want to save on living costs since it is student-friendly.”</p>
                        </div>
            
                        <div class="testItem">
                            <img src="images/Apolinario.jpg">
                            <h3>Johnric Apolinario</h3>
                            <h4>1st-Year BSCS</h4>
                            <p>“I really like EBL especially the Dorm Managers. They are very kind and accomodating.”</p>
                        </div>
            
                        <div class="testItem">
                            <img src="images/Bautista.jpg">
                            <h3>Gabrielle Xiane Bautista</h3>
                            <h4>1st-Year BSCS</h4>
                            <p>“EBL is recommended especially to those students who live far away like me. It provides you a second home.”</p>
                        </div>
            
                        <div class="testItem">
                            <img src="images/Mongaya.jpg    ">
                            <h3>Renz Jaepril Mongaya</h3>
                            <h4>1st-Year BSCS</h4>
                            <p>“The rooms in the dorms are spacious, and the rent is very affordable. The place is also very secure due to its tight security.”
                        </div>
                    </section>
            
                    <section class="indicators">
                        <div class="dot active" attr='0' onclick="switchTest(this)"></div>
                        <div class="dot" attr='1' onclick="switchTest(this)"></div>
                        <div class="dot" attr='2' onclick="switchTest(this)"></div>
                        <div class="dot" attr='3' onclick="switchTest(this)"></div>
                        <div class="dot" attr='4' onclick="switchTest(this)"></div>
                    </section>
                </div>
            </div>
        </section> 
        
        <section class="about" id="About">
            <h1>Creators</h1> 
                <section class="creators">
                <div class="card-container">
                    <div class="circle-container">
                        <div class="imgBox">
                            <img src="images/Deniel.png" alt="">
                        </div>
                    </div>
                    <div class="creator-content">
                        <a href="https://www.facebook.com/natividad09" target="_blank">
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <h3>Deniel Dave C. Natividad</h3>
                        <div class="textIcon">
                            <h4>Backend Developer</h4>
                        </div>
                        <div class="description">
                            <p>Main Backend Developer of the project. Responsible for most of the database creation, database linking and creation of forms.</p>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="circle-container">
                        <div class="imgBox">
                            <img src="images/Pena.jpg" alt="">
                        </div>
                    </div>
                    <div class="creator-content">
                        <a href="https://www.facebook.com/markjaily.pena.9" target="_blank">
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <h3>Mark Jaily H Peña</h3>
                        <div class="textIcon">
                            <h4>Project Manager</h4>
                        </div>
                        <div class="description">
                            <p>Oveseer of the whole project to ensure high quality. Responsible for checking erorrs, linking of webpages and dividing of work.</p>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="circle-container">
                        <div class="imgBox">
                            <img src="images/Andrei.JPG" alt="">
                        </div>
                    </div>
                    <div class="creator-content">
                        <a href="https://www.facebook.com/lanceandrei.edioyrecla/" target="_blank">
                            <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                        </a>
                        <h3>Lance Andrei E. Recla</h3>
                        <div class="textIcon">
                            <h4>Frontend Developer</h4>
                        </div>
                        <div class="description">
                            <p>Main Frontend Developer of the project. Responsible for webpage creation, webpage design and content creation</p>
                        </div>
                    </div>
                </div>
            </section> 
        </section>
        <footer>
            <div class="left-footer">
                <h2> Mailing Address: </h2>
                <ul>
                    <li> Elias B. Lopez Dormitory </li>
                    <li> University of The Philippines</li>
                    <li>Davao City, Davao del Sur, Philippines, 8000</li>
                </ul>
                <h2> Telephone Number: 09246308336 </h2>
                <h2> Email: ebl@up.edu.ph </h2>
            </div>
            <div class="middle-footer">
                <div class="footer-logos">
                    <img src="images/UP Logo.png" alt="UP Logo" class="logoImage">
                    <img src="images/UP Min Logo.png" alt="UP Logo" class="logoImage">
                </div>
                <h3> &copy; 2024 University of The Philippines, All Rights Reserved<h3>
            </div>
            <div class="right-footer">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i>Facebook</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                </ul>
            </div>
        </footer>
        <!-- Changes start here -->
        <div class="modal fade" id="dormerModal" tabindex="-1" role="dialog" aria-labelledby="dormerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Profile Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Name:</strong> <span id="namePlaceholder"></span></p>
                        <p><strong>Student Number:</strong> <span id="studentnumPlaceholder"></span></p>
                        <p><strong>Course:</strong> <span id="coursePlaceholder"></span></p>
                        <p><strong>Year Level:</strong> <span id="yearLevelPlaceholder"></span></p>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-3">Dorm Responsibilities</h5>
                        <p><strong>Rent Payment (PHP):</strong> <span id="paymentPlaceholder"></span></p>
                        <p><strong>Major Offense:</strong> <span id="majoroffensePlaceholder"></span></p>
                        <p><strong>Minor Offense:</strong> <span id="minoroffensePlaceholder"></span></p>
                        <p><strong>Last Permit:</strong> <span id="permitPlaceholder"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script>
            function dormerModal() {
                var dormerModal = new bootstrap.Modal(document.getElementById('dormerModal'));
                document.getElementById('studentnumPlaceholder').textContent = '<?php echo $studentnum; ?>';
                document.getElementById('namePlaceholder').textContent = '<?php echo $name; ?>';
                document.getElementById('coursePlaceholder').textContent = '<?php echo $course; ?>';
                document.getElementById('yearLevelPlaceholder').textContent = '<?php echo $yearlvl; ?>';
                document.getElementById('paymentPlaceholder').textContent = '<?php echo $payment; ?>';
                document.getElementById('majoroffensePlaceholder').textContent = '<?php echo $majoroffense; ?>';
                document.getElementById('minoroffensePlaceholder').textContent = '<?php echo $minoroffense; ?>';
                document.getElementById('permitPlaceholder').textContent = '<?php echo $permit; ?>';
                dormerModal.show();
            }

        </script>      
         <!--Changes ends here  -->
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
            const slideToggle = document.getElementById('slideToggle');
            const toggleSlideBar = document.querySelector('.toggleSlideBar');
            const slidebar = document.querySelector('.slidebar');
            const navbar = document.querySelector('.navbar');
            const logobar = document.querySelector('header');
            let lastScrollTop = 0;

            toggleSlideBar.addEventListener('click', function(e) {
                e.preventDefault();
                slideToggle.checked = !slideToggle.checked;
                if (slideToggle.checked) {
                    slidebar.style.transform = 'translateX(0)';
                    slidebar.style.boxShadow = '0 0 15px rgba(0, 0, 0, 0.5)';
                } else {
                    slidebar.style.transform = 'translateX(-15em)';
                    slidebar.style.boxShadow = 'none';
                }
            });

            window.addEventListener("scroll", function() {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                var navbarTop = 64;
                var toggleSlideBarTop = 80;
                var slidebarTop = 64;

                // Hide or show logobar
                if (scrollTop > lastScrollTop) {
                    logobar.style.top = "-3.5em";
                } else {
                    logobar.style.top = "0";
                }

                // Hide or show navbar, toggleSlideBar, and slidebar
                if (scrollTop > lastScrollTop) {
                    // Scrolling down
                    if (scrollTop > navbarTop) {
                        navbar.style.top = "0";
                    }
                    if (scrollTop > toggleSlideBarTop) {
                        toggleSlideBar.style.top = "1.2em";
                    }
                    if (scrollTop > slidebarTop) {
                        slidebar.style.top = "0";
                    }
                } else {
                    // Scrolling up
                    if (scrollTop <= navbarTop) {
                        navbar.style.top = "4em";
                    }
                    if (scrollTop <= toggleSlideBarTop) {
                        toggleSlideBar.style.top = "85px";
                    }
                    if (scrollTop <= slidebarTop) {
                        slidebar.style.top = "4em";
                    }
                }
                lastScrollTop = scrollTop;
            });

            // function toggleDropdown() {
            //     var dropdown = document.getElementById('dropdownMenu');
            //     dropdown.classList.toggle('active');
            // }

            // function updateTimeRange(event) {
            //     event.preventDefault();
            //     var selectedRange = event.target.getAttribute('data-range');
            //     document.getElementById('timeRangeText').innerText = selectedRange;
            //     toggleDropdown();
            // }

            // document.querySelector('.filter-icon').addEventListener('click', toggleDropdown);

            // document.querySelectorAll('.dropdown-menu a').forEach(function(anchor) {
            //     anchor.addEventListener('click', updateTimeRange);
            // });

            document.getElementById('Button').addEventListener('click', function() {
                alert('Button clicked!');
            });
        });

        // Access the testimonials
            let testSlide = document.querySelectorAll('.testItem');
            // Access the indicators
            let dots = document.querySelectorAll('.dot');

            var counter = 0;

            // Add click event to the indicators
            function switchTest(currentTest){
                currentTest.classList.add('active');
                var testId = currentTest.getAttribute('attr');
                if(testId > counter){
                    testSlide[counter].style.animation = 'next1 0.8s ease-in forwards';
                    counter = testId;
                    testSlide[counter].style.animation = 'next2 0.8s ease-in forwards';
                }
                else if(testId == counter){return;}
                else{
                    testSlide[counter].style.animation = 'prev1 0.8s ease-in forwards';
                    counter = testId;
                    testSlide[counter].style.animation = 'prev2 0.8s ease-in forwards';
                }
                indicators();
            }

            // Add and remove active class from the indicators
            function indicators(){
                for(i = 0; i < dots.length; i++){
                    dots[i].className = dots[i].className.replace(' active', '');
                }
                dots[counter].className += ' active';
            }

            // Code for auto sliding
            function slideNext(){
                testSlide[counter].style.animation = 'next1 0.8s ease-in forwards';
                if(counter >= testSlide.length - 1){
                    counter = 0;
                }
                else{
                    counter++;
                }
                testSlide[counter].style.animation = 'next2 0.8s ease-in forwards';
                indicators();
            }
            function autoSliding(){
                deleteInterval = setInterval(timer, 3000);
                function timer(){
                    slideNext();
                    indicators();
                }
            }
            autoSliding();

            // Stop auto sliding when mouse is over the indicators
            const container = document.querySelector('.indicators');
            container.addEventListener('mouseover', pause);
            function pause(){
                clearInterval(deleteInterval);
            }

            // Resume sliding when mouse is out of the indicators
            container.addEventListener('mouseout', autoSliding);
        </script>
    </body>
</html>
