<?php
$room = $params['room'];
?>


<div class="reservation-landing">
    <h1>Room</h1>


    <form method="post" enctype="multipart/form-data" class=reservationViewForm>

        <div class="form-group">
            <label>Type:</label>

            <span><?php echo $room["type"] ?></span>
        </div>
        <div class="form-group">
            <label>Room Number:</label>
            <span><?php echo $room['room_no'] ?></span>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <span><?php echo $room['description'] ?></span>
        </div>
        <div class="form-group">
            <label>Rent:</label>
            <span><?php echo "&#2547 ".$room['rent'] ?></span>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <span><?php if ($room['status'] == 0) {
                            echo '<span style="color:green"> Available </span>';
                        }
                        else if ($room['status'] == 1){
                            echo '<span style="color:orange"> In Maintainace </span>';
                        }
                        else {
                            echo '<span style="color:red"> Occupied </span>';
                        }
                        ?></span>
        </div>
        <div class="form-group">
            <label>Change Status:</label>
            <select name="status" class="form-control">
                <option>Select </option>
                <option value="0">Available </option>
                <option value="1">In Maintainance </option>
                <option value="2">Occupied </option>
            </select>
        </div>
        
        <button type="submit" class="ressubbtn btn btn-primary">Update</button>
        <a href="/dashboard" class="btn btn-primary">Return to Dashboard</a>
    </form>

</div>