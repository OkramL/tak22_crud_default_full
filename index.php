<?php 
require_once 'config/settings.php';
require_once 'config/mysqli.php';
// $kl->show($req);  // Show URL data TEST!!!
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].$script_folder; ?>" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.3.0/css/all.min.css">
    <title>CRUD with Nice URL</title>
</head>

<body>
    <?php
    # Temporary
    include 'menu.php';
    
    if(!empty($req[0]) and $req[0] != 'index') {
        $file = $req[0] . '.php'; // get name from url and add .php
        if(file_exists($file) and is_file($file)) {
            require_once($file); // Read file contents
        } else {
            include '404.php';
        }
    } else {
        include 'homepage.php';
    }    
    
    ?>
</body>
</html>