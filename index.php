<?php
    require_once("functions.php");
    require_once("view/top.php");
    $page = $_SERVER['PHP_SELF'];
    require_once("view/header.php");
    
?>

<!-- parte centrale -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">User management system</h1>
    <p>Clicca qui per la repo completa <a href="https://github.com/Maykl99/User-management-system">su GitHub</a></p>
    <?php 
      $action = getParam('action');

      switch ($action)
      {
        case 'insert': 
          break;

        default: 
          // secondo argomento valore di default
          $orderDir = getParam('orderDir', 'DESC');
          $orderBy = getParam('orderBy','id');
          $recordForPage = getParam('recordForPage', getConfig('recordForPage'));

          // evito il problema di valori ambigui passati nella url ad order by 
          if(!in_array($orderBy, getConfig('orderByColumns'))): 
            $orderBy = 'id';
          endif;

          $params = [
            'orderBy' => $orderBy,
            'orderDir' => $orderDir,
            'recordForPage' => $recordForPage,
          ];
          $users = getUsers($params);
          require_once 'view/userList.php';

      } // fine switch
    ?>
  </div>
</main>


<?php require_once("view/footer.php"); ?>