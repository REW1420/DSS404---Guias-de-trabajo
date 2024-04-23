<?php
//fetch_poll_data.php
include "database_connection.php"; // Fixed the include statement syntax

$php_framework = array("Laravel", "CodeIgniter", "CakePHP", "Phalcon", "Symfony");

$total_poll_row = get_total_rows($connect); // Fixed the function call syntax

$output = "";

if ($total_poll_row > 2) {
    foreach ($php_framework as $row) { // Fixed the foreach loop syntax
        $query = "SELECT * FROM tbl_poll WHERE php_framework = '$row'"; // Fixed the query syntax
        $statement = $connect->prepare($query);
        $statement->execute();
        $total_row = $statement->rowCount();
        $percentage_vote = round(($total_row / $total_poll_row) * 100); // Fixed the round function syntax

        $progress_bar_class = '';
        if ($percentage_vote >= 40) {
            $progress_bar_class = 'progress-bar-success';
        } elseif ($percentage_vote >= 25 && $percentage_vote < 40) { // Fixed the elseif syntax
            $progress_bar_class = 'progress-bar-info';
        } elseif ($percentage_vote >= 10 && $percentage_vote < 25) { // Fixed the elseif syntax
            $progress_bar_class = 'progress-bar-warning';
        } else {
            $progress_bar_class = 'progress-bar-danger';
        }

        $output .= "
            <div class='row'>
                <div class='col-md-2' align='right'>
                    <label> $row </label>
                </div>
                <div class='col-md-10'>
                    <div class='progress'>
                        <div class='progress-bar $progress_bar_class'
                            role='progressbar' aria-valuenow='$percentage_vote' aria-valuemin='0' aria-valuemax='100'
                            style='width: $percentage_vote%'>
                            $percentage_vote% of programmers like <b>$row</b> PHP Framework
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
    echo $output;
}

function get_total_rows($connect)
{
    $query = "SELECT * FROM tbl_poll";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
