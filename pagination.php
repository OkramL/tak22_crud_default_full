<?php
// Count records in tabel
$sql = 'SELECT COUNT(*) AS total FROM simple';
$res = $kl->dbGetArray($sql);
$totalRows = $res[0]['total']; // total records 15
// Detect page number from URL
if ($totalRows > 0) {
    if (isset($req[1])) { // homepage/4
        $page = $req[1];
    } else {
        $page = 1;
    }
} else {
    $page = 1;
}

$pageCount = ceil($totalRows / MAXPERPAGE);
if (empty($page) || $page < 1 || $page > $pageCount) {
    $page = 1;
}

$nextStart = $page * MAXPERPAGE;
$start = $nextStart - MAXPERPAGE;
// echo $start;
?>
<nav aria-label="Page navigation">
    <ul class="pagination pagination-color justify-content-center">
        <li class="page-item">
            <a class="page-link <?php echo ($page == 1) ? 'disabled' : null; ?>" href="homepage/<?php echo (($page - 1) == 0) ? '1' : ($page - 1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        for ($x = 0; $x < $pageCount; $x++) {
        ?>
            <li class="page-item">
                <a class="page-link <?php echo (($x + 1) == $page) ? 'active' : null; ?>" href="homepage/<?php echo ($x + 1); ?>"><?php echo ($x + 1); ?></a>
            </li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link <?php echo ($page >= $pageCount) ? 'disabled' : null; ?>" href="homepage/<?php echo (($page + 1) > $pageCount) ? $pageCount : $page + 1;  ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>