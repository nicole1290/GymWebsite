<html>

<head>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Set Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <p class="text-center">Your password cannot be the same as your username.</p>
                <form method="post" action="" id="passwordForm">
                    <input type="password" class="input-lg form-control" name="password" id="password1" placeholder="New Password" autocomplete="off">
                    <input type="password" class="input-lg form-control" name="passwordConfirmation" id="password2" placeholder="Repeat Password" autocomplete="off">
                    <input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
                </form>
            </div>
            
        </div>
    </div>

</body>

</html>