<div class="border-right border-left border-dark">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Second Name</th>
            <th scope="col">Group</th>
            <th scope="col">Points</th>
        </tr>
        </thead>
        <tbody>

        <!-- foreach posts -->
        <?php foreach ($var as $person){ ?>
                    <tr>
                        <th scope="row"><?php echo $person["Id"]; ?></th>
                        <td><?php echo $person["FirstName"]; ?></td>
                        <td><?php echo $person["SecondName"]; ?></td>
                        <td><?php echo $person["PartyId"]; ?></td>
                        <td><?php echo $person["Points"]; ?></td>
                    </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center align-items-center position-sticky" style="height: auto">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="/" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <!-- foreach pages -->
            <?php
                if($count < 5) foreach (range(1,$count) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
                if($count > 4 && $cur_page < 5) foreach (range(1, 5) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
                if($count - 5 < 5 && $cur_page > 5) foreach (range($count - 4, $count) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
                if($count > 4 && $count - 5 < 5 && $cur_page == 5) foreach (range($cur_page - 2, $count - 2) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
                if($count > 4 && $count - 5 > 5 && $cur_page >= 5 && $cur_page <= $count - 4) foreach (range($cur_page - 2,$cur_page + 2) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
                if($count > 4 && $count - 5 > 5 && $cur_page > $count - 4) foreach (range($count-4,$count) as $p) echo '<li class="page-item"><a class="page-link" href="/'. $p .'">'. $p .'</a></li>';
            ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo $count; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

<!-- <li class="page-item"><a class="page-link" href="<?php echo $i; ?>"> <?php echo $i; ?> </a></li> -->