<?php
$reservation = $params['reservation'];
?>


<div class="reservation-landing">
    <h1>Reservation</h1>


    <form method="post" enctype="multipart/form-data" class=reservationViewForm>

        <div class="form-group">
            <label>Reservation Date:</label>

            <span><?php echo $reservation["reservation_date"] ?></span>
        </div>
        <div class="form-group">
            <label>Name of Guest:</label>
            <span><?php echo $reservation['name'] ?></span>
        </div>
        <div class="form-group">
            <label>Phone No:</label>
            <span><?php echo $reservation['phone_number'] ?></span>
        </div>
        <div class="form-group">
            <label>Email Address:</label>
            <span><?php echo $reservation['email'] ?></span>
        </div>
        <div class="form-group">
            <label>Reserved Date From:</label>
            <span><?php echo $reservation['reserved_date_from'] ?></span>
        </div>
        <div class="form-group">
            <label>Reserved Date To:</label>
            <span><?php echo $reservation['reserved_date_to'] ?></span>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <span><?php if ($reservation['status'] == 0) {
                        echo '<span style="color:orange"> Pending </span>';
                    } else if ($reservation['status'] == 1) {
                        echo '<span style="color:blue"> Confirmed </span>';
                    } else if ($reservation['status'] == 2) {
                        echo '<span style="color:red"> Expired </span>';
                    } else if ($reservation['status'] == 3) {
                        echo '<span style="color:green"> Assigned </span>';
                    } else {
                        echo '<span style="color:grey"> Checked Out </span>';
                    }
                    ?></span>
        </div>

        <div class="form-group">
            <label>Requested Room Reservations:</label>
            <span><?php echo $reservation['reservation'] ?></span>
        </div>

       
        <div class="form-group">
            <label>Comments:</label>
            <input type="text" class="form-control" name="comments" value = "<?php echo $reservation['comments'] ?>">
        </div>
        <div class="form-group">
            <label>Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" class="form-control" value="">
        </div>
        <div class="form-group">
            <label>Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" class="form-control" value="">
        </div>

        <script>
            document.getElementById("checkin").value = "<?php echo $reservation['checkin_date'] ?>";
            document.getElementById("checkout").value = "<?php echo $reservation['checkout_date'] ?>";
        </script>
        <div class="form-group">
            <label>Change Status:</label>
            <select name="status" class="form-control">
                <option>Select </option>
                <option value="0">Pending </option>
                <option value="1">Confirmed </option>
                <option value="2">Expired </option>
                <option value="3">Assigned </option>
                <option value="4">Checked Out</option>
            </select>
        </div>
        <div class="form-group">
            <label>Assigned Rooms:</label>
            <textarea class="form-control" name="assigned_rooms"><?php echo $reservation['assigned_rooms'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Rent:</label>
            <input type="number" class="form-control" name="rent" value = "<?php echo $reservation['rent'] ?>">
        </div>
        <button type="submit" class="ressubbtn btn btn-primary">Update</button>
        <a href="/dashboard" class="btn btn-primary">Return to Dashboard</a>
    </form>

</div>