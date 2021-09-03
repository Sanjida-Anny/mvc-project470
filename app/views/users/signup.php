<?php $errors = $params['errors'] ?? [];  ?>

<div class="login-outer-overlay-signup">
    <div class="login-box-signup">
        <h1 style="color:white">Create a new Account</h1>
        
        
        <form method="POST" enctype="multipart/form-data">
            <div class="textbox name">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Name" name="name" value="" required>
            </div>

            <div class="textbox username">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" value="" required>
            </div>

            <div class="textbox email">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" placeholder="Email" name="email" value="" required>
            </div>

            <div class="textbox phoneno">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="tel" placeholder="Phone No" name="phone" value="">
            </div>

            <div class="textbox date">
                <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                <input type="date" placeholder="DOB" name="dob" value="">
            </div>

            <div class="textbox address">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <input type="textarea" placeholder="Address" name="address" value="">
            </div>


            <div class="textbox password">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password" value="" required>
            </div>

            <div class="textbox password">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Confirm Password" name="conf-password" value="" required>
            </div>

            <div>
                <input class="signup-btn-form" type="submit" value="Join">
            </div>
        </form>
        <div class="signuplink">
        <h6 style="color:white; font-size:15px">Already have an account? <a href="\login">Login.</a></h6>
        </div>
        
        
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger execption-alert">
                <?php foreach ($errors as $error) : ?>
                    <div><?php echo $error ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>