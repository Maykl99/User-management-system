<!-- template header -->
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">

      <!-- logo -->
      <a class="navbar-brand" href="#">
        <img style="width:80px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png" alt="php_logo">
      </a>
      <!-- bottone di ricerca -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
          $currentUrl = $_SERVER['PHP_SELF']; // ritorna percorso file
      ?>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        <!-- lista -->
        <ul class="navbar-nav mr-auto">
          <?php

            // se la url contiene index e non ha action 
            $activeIndex = (stripos($currentUrl,'index') && empty($_GET['action']));
            $class = $activeIndex ? 'active' : '';

          ?>
          <li  class="nav-item">
            <a class="nav-link <?=$class?>" href="index.php">
              <i class="fas fa-users"></i> Users
              <?php if($activeIndex) { ?> <!-- se è true allora Users sarà in evidenza (colore bianco) -->
                  <span class="sr-only">(current)</span>
              <?php } ?>
            </a>
          </li>

          <?php
            // se la url contiene action ed è uguale a insert allora NEW USER sarà in evidenza
            $activeIndex = (!empty($_GET['action']) && $_GET['action'] === 'insert');
            $class = $activeIndex ? 'active' : '';
          ?>

          <li class="nav-item">
            <a class="nav-link <?=$class?>" href="index.php?action=insert">
              <i class="fas fa-user-plus"></i>
              NEW USER
            </a>
          </li>
        </ul>

        <!-- form --> 
        <form class="d-flex" method="get" action="<?=$page?>" id="searchForm"> 
          <select name="recordForPage" id="recordForPage" onchange="document.forms.searchForm.submit()">
            <option value="">SELECT</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
          </select>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

      </div>

    </div>
  </nav>

</header>