<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
    ::-webkit-scrollbar
    {
      width: 12px;  / for vertical scrollbars /
    height: 12px; / for horizontal scrollbars /
    }

    ::-webkit-scrollbar-track
    {
      background: rgb(34, 34, 34);
    }

    ::-webkit-scrollbar-thumb
    {
      background: rgb(97, 97, 97);
    }
  </style>
  <body>

    <div style="color:white;font-family: 'Source Code Pro', monospace;">
      <?php
      include 'constants.inc.php';

      $result ="";
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
      }else{
          echo 'Introduce comando <span style="color:#990000">help</span> para obtener la guia.';

      }

      ?>
    </div>
  </body>
</html>
