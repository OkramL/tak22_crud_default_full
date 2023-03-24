<?php 
if(isset($_POST['submit'])) {
    // $kl->show($_POST);
    $name = $_POST['name']; # Normal way or google example
    $birth = $kl->getVar('birth');
    $salary = $kl->getVar('salary');
    $height = $kl->getVar('height');
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
    $sql = 'INSERT INTO simple 
            (name, birth, salary, height, added)
            VALUES ('.$kl->dbFix($name).', '.$kl->dbFix($birth).', '.($salary).', '.($height).', NOW())';
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
            <h3 class="text-center">Create - Add new entry</h3>
            
            <?php 
            if(isset($success) and $success) {
                ?>
                <p class="text-success">The entry is inserted into the table</p>
                <?php
            } elseif(isset($success) and !$success) {
                ?>
                <p class="text-danger">An error occured while adding the record.</p>
                <?php
            }
            ?>
            

            <form action="create" method="post">
                <div class="row mb-2">
                    <label for="name" class="col-sm-2 form-label mt-1">Name</label>
                    <div class="col">
                        <input type="text" name="name" value="" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="birth" class="col-sm-2 form-label mt-1">Birth</label>
                    <div class="col">
                        <input type="date" name="birth" value="" value="<?php echo date("Y-m-d"); ?>" id="birth" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="salary" class="col-sm-2 form-label mt-1">Salary</label>
                    <div class="col">
                        <input type="number" min="0" max="9999" step="1" name="salary" value="" id="salary" class="form-control">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="height" class="col-sm-2 form-label mt-1">Height</label>
                    <div class="col">
                        <input type="number" min="0.00" max="2.72" step="0.01" name="height" value="" id="height" class="form-control">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <input type="submit" name="submit" value="Add person" class="btn btn-success form-control">                        
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-warning form-control">Reset form</button>
                    </div>

                </div>

            </form>
        </div>

        <div class="col-sm-2"></div>
    </div>
</div>