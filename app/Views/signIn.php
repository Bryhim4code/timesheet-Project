<?= view("pre/head") ?>
<title>Sign In</title>
<!-- <link rel="stylesheet" href="<?php base_url() ?>/public/assets/css/login.css"> -->
<link rel="stylesheet" href="../public/assets/css/login.css">

</head>

<body>
    <!-- <div class="container">
        <div class="tac">
            <h1>Sign In To Our Timesheet</h1>
            <form action="" method="post">
                <div class="input-group">
                    <input required="" type="text" class="input" name="fname" />
                    <label class="user-label" style="left: 500px;">Enter First Name</label>
                </div>
                <div class="input-group">
                    <input required="" type="password" class="input" name="password" />
                    <label class="user-label" style="left: 500px;">Enter Password</label>
                </div>
                <button type="submit" class="subBtn">Sign In!</button>
            </form>
        </div>
    </div> -->

    <div class="containerr">
        <div class="flex">
            <div class="fullpic">
                <img src="../public/assets/images/timesheet.jpg" alt="smiley" id="halfImg">
            </div>
            <div class="content">
                <div class="contentHolder">
                    <h1>Sign In to our Timesheet</h1>
                    <p>Say goodbye to manual timesheets and hello to efficiency with our amazing new timesheet app! With
                        our
                        app, you can easily track your work hours, manage your tasks, and view your progress in
                        real-time.
                    </p>
                    <form action="" method="post">

                        <div class="flexcolumn">
                            <input type="text" id="text" name="fname" placeholder="ENTER FIRST NAME" required
                                autocomplete="off" />
                            <input type="password" name="password" id="password" placeholder="ENTER PASSWORD"
                                required />
                            <button type="submit" id="signin">SIGN IN</button>
                        </div>
                    </form>
                    <h5>Don't have an account? <a href="<?php echo base_url() ?>">Sign Up</a></h5>
                </div>


            </div>
        </div>
    </div>
    <?= view('pre/footer') ?>