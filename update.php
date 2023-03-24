<?php 
if(isset($_POST['submit'])) {
    // $kl->show($_POST);
    $name = $_POST['name']; # Normal way or google example
    $birth = $kl->getVar('birth');
    $salary = $kl->getVar('salary');
    $height = $kl->getVar('height');
    $id = $kl->getVar('sid');
    // Check name
    if(strlen(trim($name)) == 0) {
        $name = 'UNKNOWN';
    }
    // Check salary 
    if(empty($salary)) {
        $salary = "NULL";
    }
    if(empty($height)) {
        $height = "NULL";
    }
    
    $sql = 'UPDATE simple SET 
            name = '.$kl->dbFix($name).',
            birth = '.$kl->dbFix($birth).',
            salary = '.($salary).',
            height = '.($height).',
            added = added
            WHERE id = ' . $id;

    if($kl->dbQuery($sql)) {
        // Alright
        $success = true;
        $_POST = array();
    } else {
        // Error
        $success = false;        
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Update - Click the edit icon to edit the person</h3>
            
            <?php
            if(isset($success) and $success) {
                ?>
                <p class="text-success">The entry is updated into the table</p>
                <?php
            } elseif(isset($success) and !$success) {
                ?>
                <p class="text-danger">An error occured while updating the record.</p>
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
                                    <a href="update_by_id/<?php echo $val['id']; ?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
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