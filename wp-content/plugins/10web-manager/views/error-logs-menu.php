<?php


function tenweb_sort_logs_date($a, $b)
{
    return ($a['date'] <= $b['date']);
}

uasort($logs, "tenweb_sort_logs_date");


?>
<style>
    table {
        width: 95%;
        border: 1px solid black;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid black;
    }

    td:nth-child(1) {
        width: 25%;
    }

    td:nth-child(2) {
        width: 60%;
    }

    td:nth-child(3) {
        width: 10%;
    }

    button {
        padding: 6px;
        margin-bottom: 6px;
    }
</style>

<h2><?php echo "Timezone: " . $time_zone; ?></h2>
<button id="tenweb_clear_logs">Clear Logs</button>
<button id="tenweb_clear_cache">Clear Cache</button>
<button id="tenweb_check_curl">Check Curl</button>
<table>
    <thead>
    <th>Key</th>
    <th>Log</th>
    <th>Date</th>
    </thead>
    <tbody>
    <?php foreach ($logs as $key => $log) { ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $log['msg']; ?></td>
            <td><?php echo $log['date']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>