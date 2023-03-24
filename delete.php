<?php 
if(isset($req[1]) and is_numeric($req[1])) {
    $sql = 'DELETE FROM simple WHERE id = ' . $req[1];
    if($kl->dbQuery($sql)) {
        $success = true;
    } else {
        $success = false;
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Delete - Delete an entry in the table</h3>
            <?php
            if (isset($success) and $success) {
            ?>
                <p class="text-success">The entry is deleted from table</p>
            <?php
            } elseif (isset($success) and !$success) {
            ?>
                <p class="text-danger">An error occured while deleting the record.</p>
            <?php
            }

            $sql = 'SELECT * FROM simple ORDER BY added DESC';
            $res = $kl->dbGetArray($sql);
            if ($res !== false) {
                // Draw table
                ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Birth</th>
                            <th>Salary</th>
                            <th>Height</th>
                            <th>Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($res as $key => $val) {
                        ?>
                            <tr>
                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo $val['name']; ?></td>
                                <td><?php echo $kl->dbDateToEstDate($val['birth']); ?></td>
                                <td><?php echo $val['salary']; ?></td>
                                <td><?php echo $val['height']; ?></td>
                                <td><?php echo $kl->dbDateToEstDateClock($val['added']); ?></td>
                                <td class="text-center">
                                    <a href="delete/<?php echo $val['id']; ?>" onclick="if(confirm('Are you sure?')) { return true; } else { return false; }">
                                        <i class="fa-solid fa-trash-can text-danger"></i>
                                    </a>
                                </td> <!-- Action -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
            ?>

        </div>

        <div class="col-sm-2"></div>
    </div>
</div>