<?php 
    $room_button = "Book a Room";
    $room_redirect = '/#booking';
    $profile = "";
    $login_status = 'Login';
    $login_redirect = '/login';
    if($params['login_status']){
    if($params['role'] != 0){
        $room_button = "Dashboard";
        $room_redirect = '/dashboard';
    }
        $login_status = 'Logout';
        $login_redirect = '/logout';
        $profile = '<li id="nav-img">
        <a href="/profile"><img src="/images/local/default_pp.jpg" alt="Profile" class="rounded-circle"></a>
    </li>';
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--extra css----->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-----My CSS ---------->
    <link href="/style/main.css" rel="stylesheet" type="text/css">
    <link href="/style/userProfile.css" rel="stylesheet" type="text/css">
    <link href="/style/styles.css" rel="stylesheet" type="text/css">
    <link href="/style/dashboard.css" rel="stylesheet" type="text/css">
    <link href="/style/reservationView.css" rel="stylesheet" type="text/css">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="/images/icon/icon.ico" type="image/x-icon">
</head>

<body>
    <div id="section-landing">
        <header>
            <div class="navbar-logo">
                <a href="/"><img src="/images/local/logo.png" alt=""></a>
            </div>
            <nav class="top-nav">
                <ul>
                    <li>
                        <a href="<?php echo $room_redirect; ?>"><?php echo $room_button; ?></a>
                    </li>
                    <li>
                        <a href="/#services">Services</a>
                    </li>
                    <li>
                        <a href="/#about">About us</a>
                    </li>
                    <li>
                        <a href="/#about">Contact</a>
                    </li>

                    <li class="btn-login">
                        <a href=<?php echo $login_redirect?>><?php echo $login_status?></a>
                    </li>

                    <?php echo $profile ?>
                </ul>
            </nav>
        </header>
        <div id="wrapper-landing">
            <?php echo $contents ?>
        </div>
    </div>

    
</body>

</html>