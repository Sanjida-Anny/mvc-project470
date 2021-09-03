<?php
$reservations = $params['reservations'];
$rooms = $params['rooms'];
$keyword = $params['keyword'];
$keyword_room = $params['keyword_room'];

?>
<div class="dashboardLanding">
    <h1>Manager Dashboard</h1>

    <h2>Reservations:</h2>
    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $keyword ?>">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reservation Date</th>
                <th scope="col">Guest</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $i => $reservation) { ?>
                
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $reservation['reservation_date'];?></td>
                    <td><?php echo $reservation['name']; ?></td>
                    <td><?php if ($reservation['status'] == 0) {
                            echo '<span style="color:orange"> Pending </span>';
                        }
                        else if ($reservation['status'] == 1){
                            echo '<span style="color:blue"> Confirmed </span>';
                        }
                        else if ($reservation['status'] == 2){
                            echo '<span style="color:red"> Expired </span>';
                        }
                        else if ($reservation['status'] == 3){
                            echo '<span style="color:green"> Assigned </span>';
                        }
                        else {
                            echo '<span style="color:grey"> Checked Out </span>';
                        }
                        ?></td>
                    <td>
                        <a href="/reservation/view?id=<?php echo $reservation['id']  ?>" class="abtn btn btn-sm btn-outline-primary">view</a>
                        <form method="post" action="/reservation/delete" style="display: inline-block">
                            <input type="hidden" name="id" value="<?php echo $reservation['id']  ?>" />
                            <button type="submit" class="abtn btn btn-sm btn-outline-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2>Hotel Rooms:</h2>
    <form action="" method="get" action="">
        <div class="input-group mb-3">
            <input type="text" name="search_room" class="form-control" placeholder="Search" value="<?php echo $keyword_room ?>">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Room No</th>
                <th scope="col">Rent</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $i => $room) { ?>
                
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $room['type'];?></td>
                    <td><?php echo $room['room_no']; ?></td>
                    <td><?php echo "&#2547 ".$room['rent']; ?></td>
                    <td><?php if ($room['status'] == 0) {
                            echo '<span style="color:green"> Available </span>';
                        }
                        else if ($room['status'] == 1){
                            echo '<span style="color:orange"> In Maintainace </span>';
                        }
                        else {
                            echo '<span style="color:red"> Occupied </span>';
                        }
                        ?></td>
                    <td>
                        <a href="/room/view?id=<?php echo $room['room_id']  ?>" class="abtn btn btn-sm btn-outline-primary">view</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>