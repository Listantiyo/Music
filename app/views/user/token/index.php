<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Custom styles for this template-->
    <link href="<?= BASEPATH; ?>admin-res/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .center {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <?php Flasher::tokenFlash(); ?>

    <div class="center">
        <form class="form-inline" action="<?= BASEPATH; ?>token/validateToken" method="POST">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Token</label>
                <input name="token" type="password" class="form-control" id="inputPassword2" placeholder="Token">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
        </form>
    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src="<?= BASEPATH; ?>admin-res/vendor/jquery/jquery.min.js"></script>

<script src="<?= BASEPATH; ?>admin-res/vendor/bootstrap/js/bootstrap.min.js"></script>

</html>