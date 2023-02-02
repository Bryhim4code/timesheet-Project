<?= view("pre/head") ?>
</head>
<style>
    .form-floating {
        display: grid;
        justify-items: center;
    }


    .middle {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-edit {
  /* margin: 0 auto; */
  /* display: block; */
  padding: 8px 10px;
  background-color: #3c42e6;
  color: #fff;
  border: none;
  border-radius: 5px;
  /* font-size: 1p3x; */
  cursor: pointer;
  /* margin-left: 5px?; */
}

    .btn-delete {
  /* margin: 0 auto; */
  /* display: block; */
  padding: 8px 10px;
  background-color: #df1212;
  color: #fff;
  border: none;
  border-radius: 5px;
  /* font-size: 1p3x; */
  cursor: pointer;
  /* margin-left: 5px?; */
}


    table {
        width: 90%;
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
        border-radius: 12px 12px 0 0;
        /* margin-bottom: 50px; */
        margin-top: 70px;
    }

    td,
    th {
        padding: 10px 16px;
        text-align: center;
    }

    th {
        background-color: #584e46;
        color: #fafafa;
        font-family: 'Open Sans', Sans-serif;
        font-weight: bold;
    }

    tr {
        width: 100%;
        background-color: #fafafa;
        font-family: 'Montserrat', sans-serif;
    }

    tr:nth-child(even) {
        background-color: #eeeeee;
    }



    .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-left: 135px;
        margin-right: 135px;
        margin-top: 50px;
    }
</style>

<body>
    <div class="flex">
        <h1>Create Users</h1>
        <button id="addTis">create users</button>
    </div>
    <div class="middle">
        <table class="table ">
            <thead>
                <tr>
                    <th class="text-center">S.N.</th>
                    <th class="text-center">Firstname</th>
                    <th class="text-center">lastname</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Role</th>
                    <th class="text-center" colspan="2">Action</th>
                </tr>
            </thead>
            <?php foreach ($users as $user) { ?>
            <tbody>
                <tr>
                <td>
                    <?=$user['id']?>
                </td>
                <td>
                    <?=$user["fname"]?>
                </td>
                <td>
                    <?=$user["lname"]?>
                </td>
                <td>
                    <?=$user["email"]?>
                </td>
                <td>
                    <?=$user["password"]?>
                </td>
                <td>
                    <?=$user["role"]?>
                </td>
                <td>
                 <a href="<?php echo base_url('createuser/edit/' .$user['id'])?>"><button class="btn-edit btn-primary">Edit</button></a>
                    <a href="<?php echo base_url('createuser/delete/' .$user['id'])?>"><button class="btn-delete btn-danger">Delete</button></a>
                </td>
                <!-- <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<//?['variation_id']?>')">Edit</button></td> -->
                <!-- <td><button class="btn btn-danger" style="height:40px"  onclick="variationDelete('<//?=['variation_id']?>')">Delete</button></td> -->
                </tr>
            </tbody>
            <?php } ?>
             </table>

    </div>

    <div id="modal">
        <div class="modal-content">
            <span id="close">&times;</span>



            <div class="contain">
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
            <!-- <form action="" method="post">
                <h1 class="timesheet-header">Add New Timesheet!</h1>
                <div class="input-group">
                    <input required="" type="text" class="input" name="task_title" />
                    <label class="user-label" style="left: 380px;">Task Title</label>
                </div>
                <div class="flexalign">
                    <div class="input-group">
                        <label class="user-labelD">From</label>
                        <input required="" type="time" class="inputDate" name="worked_start" />
                    </div>
                    <div class="input-group">
                        <label class="user-labelD">To</label>
                        <input required="" type="time" class="inputDate" name="worked_end" />
                    </div>
                </div>
                <div class="flexonly">
                    <div class="input-group">
                        <input required="" type="text" class="input" name="task_desc" />
                        <label class="user-label" style="left: 380px;">Task Description</label>
                    </div>

                </div>

                <button type="submit" class="subBtn">Submit!</button>
            </form> -->
        </div>



</body>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= view("pre/footer") ?>