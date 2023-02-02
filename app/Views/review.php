<?= view("pre/head") ?>
<title>Review All Timesheet</title>
</head>

<body>
    <?php $this->session = \Config\Services::session(); ?>
    <div class="timesheet-container">
        <form action="" method="post">
            <input type="date" name="search" id="">
            <button type="submit">Search</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <!-- <th>Task-Title</th>
                    <th>Start Time</th>
                    <th>Time Spent</th>
                    <th>End Time</th>-->
                    <th>Core Task</th>
                    <th>Other Task</th>
                    <th>Date</th>

                </tr>
            </thead>
            <?php foreach ($timesheetEntries as $entries) { ?>
            <tbody>
                <tr>
                    <td><?php echo $entries['fname'] ?></td>
                    <!-- <td><?php //echo $entries->current_date ?></td> -->
                    <?php if($entries['core'] == "0") { ?>
                    <td><?php  echo "NO CORE TASK" ?></td>
                    <?php } else { ?>
                    <td><?php echo $entries['core'] ?></td>
                    <?php } ?>
                    <td><?php echo $entries['other'] ?></td>
                    <!-- <td><?php // echo $entries['worked_end'] ?></td> -->
                    <!-- <td><?php // echo $entries['task_desc'] ?></td> -->
                    <!-- <td><?php // echo $entries['task_type'] ?></td> -->
                    <td><?php echo $entries['current_date'] ?></td>
                    <td>
                        <!-- <button><a href="<?php //echo base_url('/review/summary/' .$entries->fname)?>">View</a></button> -->
                        <button><a href="<?php echo base_url('/review/summary/' .$entries['fname'])?>">View</a></button>
                    </td>

                </tr>
            </tbody>
            <?php } ?>
            <?php if (empty($timesheetEntries)) { ?>
            <b>No Results Found</b>
            <?php session()->setFlashdata('error',  'No results found!'); ?>
            <?php } ?>
        </table>
    </div>
    </div>
    <script src="<?= base_url() ?>/assets/js/script.js"></script>
    <?= view('pre/footer') ?>