<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="console">
        <div class="console-head">
            <div class="console-title">Console</div>
            <div class="console-actions">
                <div class="console-action console-action-min"><span class="fa fa-caret-down"></span></div>
                <div class="console-action console-action-max"><span class="fa fa-arrows-alt"></span></div>
                <div class="console-action console-action-close"><span class="fa fa-close"></span></div>
            </div>
        </div>
        <div class="console-body">
            <div class="console-text">
                <form action="executa.php" method="post">
                    <input class="input_command_line" type="text" name="command" value="">
                    <hr size="1">
                </form>
            </div>
            <div class="console-body-text">
                <?php
                include 'constants.inc.php';




                session_start();
                $multiple_response = Array();
                if (!empty($_SESSION['answer'])) {
                    if (is_array($_SESSION['answer'])) {
                        $multiple_response = $_SESSION['answer'];

                        foreach ($multiple_response as $item) {
                            echo $item . "<br>";
                        }
                    } else {
                        $single_response = $_SESSION['answer'];
                        echo $single_response;
                    }

                    session_destroy();
                }

                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
