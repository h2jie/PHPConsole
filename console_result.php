
<div style="color:white;font-family: 'Source Code Pro', monospace;">
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
  }else{
      echo 'Introduce comando <span style="color:#990000">help</span> para obtener la guia.';

  }

  ?>
</div>
