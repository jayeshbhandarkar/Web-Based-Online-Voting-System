<?php 

 session_start();
 session_destroy();
     echo "
     <script>
     history.back()
     </script>
     ";

?>