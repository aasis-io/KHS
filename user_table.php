<div class="service-filter">
    <form action="filter.php" id="filterForm" method="post">
        <select name="filterArea" id="filterArea">
            <option value="" selected>Filter By Area</option>
            <?php foreach ($areaList as $a) { ?>
                <option value="<?php echo $a['name']; ?>"><?php echo $a['name']; ?></option>
            <?php } ?>
        </select>

        <select name="occupation" id="occupation" required>
            <option value="" selected>Filter By Profession</option>
            <?php foreach ($professionList as $p) { ?>
                <option value="<?php echo $p['name']; ?>"><?php echo $p['name']; ?></option>
            <?php } ?>
        </select>
    </form>
</div>



<table id="userTable">
    <thead>
        <tr>
            <th>S. No.</th>
            <th>Name</th>
            <th>Area</th>
            <th>Profession</th>
            <th>Reviews</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($filteredUsers as $key => $u) { ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $u['fullname']; ?></td>
                <td><?php echo $u['area']; ?></td>
                <td><?php echo $u['occupation']; ?></td>
                <?php
                if ($reviewCount > 0) { ?>
                    <td> <?php echo round($averageRating, 1); ?><i class='bx bxs-star'></i> • <?php echo $reviewCount; ?> Reviews</td>
                <?php } else { ?>
                    <td> Not reviewed yet </td>
                <?php } ?>
                <td><a href=""><u>View Details</u></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>