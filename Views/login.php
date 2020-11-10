<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0 maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="../Content/Custom/style.css" rel="stylesheet" />
    <link href="../Content/Custom/site.css" rel="stylesheet" />
    <title>Login</title>
    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" />
    <!-- font awesome icon -->
    <style>
        [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
            position: relative !important;
            left: 0px !important;
            opacity: 1 !important;
        }
    </style>
</head>
<body>
    <section class="register">
        <div class="container register_page">
            <?php session_start(); if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; } ?>
            <div class="register_page_card background-white padding-xy border-radius">
                <div class="register_page_card_header background-offwhite border-radius text-center padding-xy mb-3 color-red">
                    <h2>Login</h2>
                    <p>Please login to continue</p>
                </div>
                <div class="row">
                <form action="../Controllers/loginpost.php"  class = "form-horizontal w-100" method="POST">
                    <div class="col-sm-12 w-100">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email"  class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="col-sm-12 w-100">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password"  class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <span class="color-red">Don't have an account? <a href="donoradd.php">Register</a></span>
                    </div>
                    <br>
                    <button class="btn btn-danger float-right mr-3" type="submit">SIGN IN</button>
                    <a class="btn btn-danger float-left ml-3" href="index.php">Back to Home</a>
                </form>
                </div>
            </div>
        </div>
    </section>
    <script src="../Scripts/jquery-3.3.1.js"></script>
    <script src="../Scripts/popper.min.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <?php unset($_SESSION['msg']); ?>
</body>
</html>
