<?= view('pre/head') ?>
<style>
table {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px #ccc;
    width: 100%;
    border-collapse: collapse;
    cursor: pointer;
    margin-bottom: 50px;
    /* margin-top: 100px; */
}

tr:hover {
    background-color: #f2f2f2;
}

th {
    font-size: 18px;
    font-weight: 600;
    text-align: left;
    border: 1px solid #ccc;
    padding: 12px;
}

td {
    font-size: 16px;
    border: 1px solid #ccc;
    padding: 12px;
    cursor: pointer;
}
</style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Task-Title</th>
                <th>Start Time</th>
                <th>Time Spent</th>
                <th>End Time</th>
                <th>Task Description</th>
                <th>Task Type</th>
                <th>Date</th>
            </tr>

        </thead>
        <?php foreach ($users as $user) { ?>
        <tbody>
            <tr>

                <td><?= $user['fname'] ?></td>
                <td><?= $user['task_title'] ?></td>
                <td><?= $user['worked_start'] ?></td>
                <td><?= $user['worked_time'] ?></td>
                <td><?= $user['worked_end'] ?></td>
                <td><?= $user['task_desc'] ?></td>
                <td><?= $user['task_type'] ?></td>
                <td><?= $user['current_date'] ?></td>

            </tr>

        </tbody>
        <?php } ?>
    </table>




    <?= view('pre/footer') ?>