<?= view("pre/head") ?>
<title>Time Sheet</title>
</head>

<body>
    <?php $this->session = \Config\Services::session(); ?>
    <?php if ($this->session->get('fname') == "") { ?>
    <?php return redirect()->to('login'); ?>
    <?php } ?>
    <div class="container">

        <div class="header">
            <h1>Timesheet</h1>
            <div class="flexalign">
                <h4> <?php echo $this->session->get('fname') ?></h4>
                <a class="dropdown-item" href="<?php echo base_url(); ?>/home/signout" onclick="return confirm('Are you sure you want to log out?');">
                    <i class="fa-solid fa-right-from-bracket" style="color: red; padding : 0px 10px 0px 20px;"></i>Log Out</a>

            </div>
        </div>

        <div class="move">
            <?php if ($this->session->get('role') == "supervisor") { ?>
               <a href="<?= base_url('/createuser') ?>"> <button id='add' >Create User</button></a>
                <button type="submit" id="reviewBtn"><a href="<?= base_url() ?>/review">Review all timesheet</a></button>
            <?php } else { ?>
            <?= ""; ?>
            <?php } ?>
            <button id="addTis">Add Timesheet!</button>

        </div>

        <div id="modal">
            <div class="modal-content">
                <span id="close">&times;</span>
                <form action="" method="post">
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
                        <select name="task_type" id="">
                            <option value="Other">Other</option>
                            <option value="core">Core</option>
                        </select>
                    </div>

                    <button type="submit" class="subBtn">Submit!</button>
                </form>
            </div>

        </div>


        <div class="timesheet-container">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Task-Title</th>
                        <th>Start Time</th>
                        <th>Time Spent</th>
                        <th>End Time</th>
                        <th>Task Description</th>
                        <th>Task Type</th>
                    </tr>
                </thead>
                <?php foreach ($users as $user) { ?>
                <tbody>
                    <tr>
                        <td><?= $user['current_date'] ?></td>
                        <td><?= $user['task_title'] ?></td>
                        <td><?= $user['worked_start'] ?></td>
                        <td><?= $user['worked_time'] ?></td>
                        <td><?= $user['worked_end'] ?></td>
                        <td><?= $user['task_desc'] ?></td>
                        <td><?= $user['task_type'] ?></td>
                        <!-- <td>
                            <button><a href="<?php //site_url('review/summary/edit/' . $user['id'])
                                                ?>">Edit</a></button>
                        </td> -->

                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>

    </div>

    <script src="<?= base_url() ?>/assets/js/script.js"></script>
    <?= view('pre/footer') ?>