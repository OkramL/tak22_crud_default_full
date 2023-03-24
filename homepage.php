<div class="container">
    <div class="row">
        <!-- First col empty LEFT -->
        <div class="col-sm-2"></div>
        
        <div class="col-sm-8">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center mb-2">Home page - Browse table data</h3>                    
                    <?php 
                    include 'pagination.php';

                    # $sql = 'SELECT * FROM simple ORDER BY added DESC';
                    $sql = 'SELECT * FROM simple ORDER BY added DESC LIMIT ' . $start . ', ' . MAXPERPAGE;
                    $res = $kl->dbGetArray($sql);
                    if($res !== false) { // $res with data
                        // $kl->show($res); // nice formed data :)
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($res as $key=>$val) {
                                    ?>
                                    <tr>
                                        <td><?php echo ($start + $key+1); ?></td>
                                        <td><?php echo $val['name']; ?></td>
                                        <td><?php echo $kl->dbDateToEstDate($val['birth']); ?></td>
                                        <td><?php echo $val['salary']; ?></td>
                                        <td><?php echo $val['height']; ?></td>
                                        <td><?php echo $kl->dbDateToEstDateClock($val['added']); ?></td>
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
            </div>
        </div>
        
        <!-- Last col empty RIGHT -->
        <div class="col-sm-2"></div>
    </div>
</div>