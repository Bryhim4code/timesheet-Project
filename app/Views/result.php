<?= view("pre/head") ?>
<title>Review All Timesheet</title>
</head>

<body>
    <?php $this->session = \Config\Services::session(); ?>
    <div class="timesheet-container">
        <form action="<?= base_url() ?>/search" method="post">
            <input type="date" name="search" id="">
            <button type="submit">Search</button>
        </form>

        <?php if (empty($results)) { ?>
        <p>No Results Found</p>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Task-Title</th>
                    <!-- <th>Start Time</th>
                    <th>Time Spent</th>
                    <th>End Time</th> -->
                    <th>Task Description</th>
                    <!-- <th>Task Type</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result) { ?>
                <tr>
                    <td><?= $result['current_date'] ?></td>
                    <td><?= $result['task_title'] ?></td>
                    <td><?= $result['task_desc'] ?></td>
                </tr>
                <?php }; ?>
            </tbody>

        </table>
    </div>
    </div>
    <script src="<?= base_url() ?>/assets/js/script.js"></script>
    <?= view('pre/footer') ?>