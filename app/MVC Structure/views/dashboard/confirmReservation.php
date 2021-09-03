<?php
$current_user = $_SESSION['current_user'];
?>

<div class="confirm-container">
    <h1>Reservation Confimed</h1>
    <div class="confirm-message">
        Dear <?php echo $current_user['name']?>, <br>
        It is our greate pleasure to state that we have recieved your Reservation. One of our Representatives will contact you via email or phone to confirm your Reservation. We are hoping to see you in our establishemnt soon.<br>
        Sincerely,<br>
        The Grand Maksuda<br>
        Hotel & Resort<br>
    </div>
</div>


