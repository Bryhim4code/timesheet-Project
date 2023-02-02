<?= view("pre/head") ?>
<title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="tac">
            <h1>Sign Up To Our Timesheet</h1>
            <form action="" method="post">
                <div class="input-group">
                    <input required="" type="text" class="input" name="fname" />
                    <label class="user-label">First Name</label>
                </div>
                <div class="input-group">
                    <input required="" type="text" class="input" name="lname" />
                    <label class="user-label">Last Name</label>
                </div>
                <div class="input-group">
                    <input required="" type="email" class="input" name="email" />
                    <label class="user-label">Enter Email Address</label>
                </div>
                <div class="input-group">
                    <input required="" type="password" class="input" name="password" />
                    <label class="user-label">Enter Password</label>
                </div>
                <button type="submit" class="subBtn">Sign Up!</button>
            </form>
        </div>
    </div>
    <?= view('pre/footer') ?>