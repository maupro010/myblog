<?php
//check sign_in statement
$isSignIn = $_COOKIE['sign_in'] ?? false;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Maupro010</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!-- Home Page -->
<section class="header" id="header">
    <!-- Navigation Bar -->
    <nav>
        <a style="margin-left: 50px" href="index.php"><img src="images/logo%20MTA.png"> </a>
        <div class="nav-links" id="nav-links">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="#header"><b>Home Page</b></a></li>
                <li><a href="#info"><b>About me</b></a></li>
                <li><a href="#image"><b>Some image</b></a></li>
                <li><a href="blog.php"><b>My Blog</b></a></li>
                <li><a href="https://www.facebook.com/mta51" target="_blank"><b>Facebook</b></a></li>
                <li><a href="https://www.instagram.com/51mta" target="_blank"><b>Instagram</b></a></li>
                <li><a style="display: <?php echo $isSignIn ? 'none':'block' ?>" href="sign_in.php?address=index.php"><b>Sign In</b></a></li>
                <li><a style="display: <?php echo $isSignIn ? 'block':'none' ?>" href="create.php"><b>Blog Manager</b></a></li>
                <li><a style="display: <?php echo $isSignIn ? 'block':'none' ?>" href="sign_out.php?id=1"><b>Sign Out</b></a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
    <!-- Home page content -->
    <div class="text-box">
        <h1>Welcome to my blog!</h1>
        <p>Hello every one, I'm Phuc</p>
        <a href="blog.php" class="hero-btn">Fell free to visit</a>
    </div>
</section>

<!-- About me -->
<section class="info" id="info">
    <h1>About me</h1>
    <div class="row">
        <!-- Show Avatar -->
        <div class="info-col">
            <h2><b>Lê Hoàng Phúc</b></h2>
            <img src="images/avatar.jpg" style="width: 100%;padding-top: 20px" alt="avatar">
        </div>

        <!-- Center Column -->
        <div class="info-col">
            <h2><i class="fa fa-vcard"></i> Information</h2>
            <h3><i class="fa fa-briefcase fa-fw"></i> Teacher</h3>
            <h3><i class="fa fa-home fa-fw"></i> Hanoi, Vietnam</h3>
            <h3><i class="fa fa-birthday-cake fa-fw"></i> 30/7/1997</h3>
            <h3><i class="fa fa-envelope fa-fw"></i> phuc51mta@gmail.com</h3>
            <h3><i class="fa fa-phone fa-fw"></i> 037665****</h3>
            <h2><i class="fa fa-asterisk"></i> Skills</h2>
            <h3>C++</h3>
            <div class="process">
                <div class="bar" style="width: 80%">80%</div>
            </div>
            <h3>Qt Framework</h3>
            <div class="process">
                <div class="bar" style="width: 80%">80%</div>
            </div>
            <h3>Python</h3>
            <div class="process">
                <div class="bar" style="width: 80%">80%</div>
            </div>
            <h3>HTML, CSS, PHP</h3>
            <div class="process">
                <div class="bar" style="width: 70%">70%</div>
            </div>
            <h3>OpenGL</h3>
            <div class="process">
                <div class="bar" style="width: 50%">50%</div>
            </div>
            <h3>MySQL</h3>
            <div class="process">
                <div class="bar" style="width: 50%">50%</div>
            </div>
            <h2><i class="fa fa-globe"></i> Language</h2>
            <h3>English</h3>
            <div class="process">
                <div class="bar" style="width: 59%">Toeic 590</div>
            </div>
            <h3>Russian</h3>
            <div class="process">
                <div class="bar" style="width: 50%">B1</div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="info-col">
            <h2><i class="fa fa-suitcase"></i> Experience</h2>
            <div>
                <h3>Teacher/Military Technical Academy</h3>
                <h4><i class="fa fa-calendar"></i> Jan 2021 - Current</h4>
                <p>Giáo viên Bộ môn Ra đa, Khoa Vô tuyến điện tử</p>
            </div>
            <hr>
            <div>
                <h3>Software Developer/Freelancer</h3>
                <h4><i class="fa fa-calendar"></i> Mar 2019 - Current</h4>
                <p>Lập trình C++ trên nền tảng Qt framework, sử dụng thư viện đồ họa OpenGL để xây dựng phần mềm mô phỏng thiết bị đầu cuối một số đài ra đa tàu Hải quân</p>
            </div>
            <h2><i class="fa fa-certificate fa-fw"></i> Education</h2>
            <div>
                <h3>Học viện Kỹ thuật Quân sự</h3>
                <h4><i class="fa fa-calendar"></i> Sep 2015 - Dec 2020</h4>
                <p>Lớp Ra đa hải quân, c351, d3</p>
            </div>
            <hr>
            <div>
                <h3>THPT Lệ Thủy</h3>
                <h4><i class="fa fa-calendar"></i> Sep 2012 - Jul 2015</h4>
                <p>Học sinh lớp 10A8, 11A8, 12A8</p>
            </div>
            <hr>
            <div>
                <h3>THCS Xuân Thủy</h3>
                <h4><i class="fa fa-calendar"></i> Sep 2008 - Jul 2012</h4>
                <p>Học sinh lớp 6A, 7A, 8A, 9A</p>
            </div>
            <hr>
            <div>
                <h3>TH Xuân Thủy</h3>
                <h4><i class="fa fa-calendar"></i> Sep 2003 - Jul 2008</h4>
                <p>Học sinh lớp 1B, 2B, 3B, 4B, 5B</p>
            </div>
    </div>
</section>

<!-- Some image -->
<section class="image" id="image">
    <h1>Some image</h1>
    <div class="row">
        <div class="image-col">
            <img src="images/bo-suu-tap-hinh-nen-1.jpg">
        </div>
        <div class="image-col">
            <img src="images/bo-suu-tap-hinh-nen-2.jpg">
        </div>
        <div class="image-col">
            <img src="images/bo-suu-tap-hinh-nen-3.jpg">
        </div>
        <div class="image-col">
            <img src="images/bo-suu-tap-hinh-nen-4.jpg">
        </div>
    </div>
</section>

<!-- Copyright -->
<p style="text-align: center;margin-bottom: 0;padding-bottom: 10pt"><em>Copyright Le Hoang Phuc</em></p>

<!-- Script -->
<script>
    navLinks = document.getElementById('nav-links');
    function showMenu(){
        navLinks.style.right='0';
    }
    function hideMenu(){
        navLinks.style.right='-200px';
    }
</script>
</body>
</html>
