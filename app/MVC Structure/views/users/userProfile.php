<?php 
$current_user = $params['current_user'] ?? $default;
$role = "Guest";
if($current_user['role'] == 1){
    $role = "Manager";
}

else if($current_user['role'] == 2){
    $role = "Administrator";
}


$default = "You are not supposed to be here";
$name = $current_user['name'] ?? $default;
$name_array= explode(" ",$name);
$fname = array_shift($name_array);
$lname = implode(" ",$name_array,);
$username = $current_user['username'] ?? $default; 
$email = $current_user['email'] ?? $default;
$phone = $current_user['phone_number'] ?? $default;
$address = $current_user['address'] ?? $default;
?>


<div class="main-content">
    <!-- Top navbar -->

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 100px">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Hello <?php echo $name ?></h1>
                    <p class="text-white mt-0 mb-5">Welcome to 'The Grand Maharaja'. This is your profile page. You can see your personal information and edit them if you like.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="./images/local/default_pp.jpg" alt="" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading"></span>
                                        <span class="description"></span>
                                    </div>
                                    <div>
                                        <span class="heading"></span>
                                        <span class="description"></span>
                                    </div>
                                    <div>
                                        <span class="heading"></span>
                                        <span class="description"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                <?php echo $name ?>
                            </h3>

                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i><?php echo $role?>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>The Grand Maharaja
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">

                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="color: white;">
                        <form method="POST" action="">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" id="input-username" class="form-control form-control-alternative" name ="username" placeholder="<?php echo $username?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="input-email" class="form-control form-control-alternative" name ="email" placeholder="<?php echo $email?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First name</label>
                                            <input type="text" id="input-first-name" class="form-control form-control-alternative" name ="fname" placeholder="<?php echo $fname?>" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last name</label>
                                            <input type="text" id="input-last-name" class="form-control form-control-alternative" name ="lname" placeholder="<?php echo $lname?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Phone Number</label>
                                            <input type="tel" id="input-email" class="form-control form-control-alternative" name ="phone" placeholder="<?php echo $phone?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" class="form-control form-control-alternative"  name ="address" placeholder="<?php echo $address?>" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <input type = "submit" class="btn btn-info" style="width:20%; margin-left:37%" value="Save Changes">                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>