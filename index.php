
<?php session_start(); ?>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Local CSS -->
<link rel="stylesheet" href=style.css>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="controller/formValidation.js"></script>

</head>
<body>



<div class='container'>
<div class="row">
<div class= "col-sm-8">
    <h1>Ukolnicek - app for your tasks</h1>

</div>
    <?php if (!isset($_SESSION['user']))
    {
        include 'view/login.php';

    }
    else {
    
        echo '<div class="col-sm-2">'. $_SESSION['user'];
        echo '<br>';
        echo $_SESSION['userID'].'</div></div>';
    }
    if (isset($_SESSION['user'])) {
    
        include 'view/tasklist.php';

    }
    ?>
    
</div>
<script src="ajax.js"></script>
</body>
