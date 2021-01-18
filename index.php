<?php
    require_once("functions.php");
    require_once("view/top.php");
    require_once("view/header.php");
?>

<!-- parte centrale -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">User management system</h1>
    <p>Clicca qui per la repo completa <a href="https://github.com/Maykl99/User-management-system">su GitHub</a></p>
    <?php 
      $action = getParam('action');
      switch ($action){
        case 'insert': 
          break;

        default: 
        $orderBy = getParam('orderBy','id');
        // evito il problema di valori ambigui passati nella url ad order by 
        if(!in_array($orderBy, getConfig('orderByColumns'))): 
          $orderBy = 'id';
        endif;

        $params = ['orderBy' => $orderBy];
        $users = getUsers($params);
        require_once 'view/userList.php';
      }
    ?>
  </div>
</main>


<?php require_once("view/footer.php"); ?>