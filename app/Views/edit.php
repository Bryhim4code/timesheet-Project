<?= view("pre/head") ?>
</head>
<style>
.form-floating {
    display: grid;
    justify-items: center;
}
</style>

<body>
    <form action="<//?= base_url('timesheet/update/'. $users['id']) ?>" method="post">
        <div id="modal">
            <div class="modal-content">
                <span id="close">&times;</span>
                <form action="" method="post">
                    <h1 class="timesheet-header">Edit Timesheet!</h1>
                    <div class="input-group">
                        <input required="" type="text" class="input" name="task_title"
                            value="<?= $user['task_title'] ?>" />
                        <label class="user-label" style="left: 380px;">Task Title</label>
                    </div>
                    <div class="flexalign">
                        <div class="input-group">
                            <label class="user-labelD">From</label>
                            <input required="" type="time" class="inputDate" name="worked_start"
                                value="<?= $user['worked_start'] ?>" />
                        </div>
                        <div class="input-group">
                            <label class="user-labelD">To</label>
                            <input required="" type="time" class="inputDate" name="worked_end"
                                value="<?= $user['worked_end'] ?>" />
                        </div>
                    </div>
                    <div class="flexonly">
                        <div class="input-group">
                            <input required="" type="text" class="input" name="task_desc"
                                value="<?= $user['task_desc'] ?>" />
                            <label class="user-label" style="left: 380px;">Task Description</label>
                        </div>
                        <select name="task_type" id="" value="<?= $user['task_type'] ?>">
                            <option value="Other">Other</option>
                            <option value="core">Core</option>
                        </select>
                    </div>

                    <button type="submit" class="subBtn">Submit!</button>
                </form>
            </div>

        </div>
    </form>
    <?= view("pre/footer") ?>