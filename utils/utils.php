<?php

function console_log(mysqli_result $mysql_fetch_data)
{
    $result = mysqli_fetch_all($mysql_fetch_data, MYSQLI_ASSOC);
    $json = json_encode($result, JSON_UNESCAPED_UNICODE);

    echo "
        <script>
            const users = $json;
            console.log(users);
        </script>
    ";
}


function console_log_text(string $text_data)
{
    $json = json_encode($text_data, JSON_UNESCAPED_UNICODE);

    echo "
        <script>
            const users = $json;
            console.log(users);
        </script>
    ";
}
