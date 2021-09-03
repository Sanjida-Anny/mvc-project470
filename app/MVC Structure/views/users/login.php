<?php $errors = $params['errors'] ?? [];  ?>

<div class="login-outer-overlay">
    <div class="login-box">
        <h1 style="color:white">Login</h1>
        
        <form method="POST" enctype="multipart/form-data">
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username" value="">
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="login-pass" value="">
            </div>

            <div>
                <input class="login-btn-form" type="submit" value="Sign in">
            </div>
        </form>
        <div class="mysignuplink">
        <h6 style="font-size:15px">First time here? <a href="\signup">Join us.</a></h6>
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