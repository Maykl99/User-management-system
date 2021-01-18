<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">
        <img style="width:80px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1280px-PHP-logo.svg.png" alt="">

      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
          $currentUrl = $_SERVER['PHP_SELF'];
        ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav mr-auto">
                <?php

                $activeIndex =(stripos($currentUrl,'index') && empty($_GET['action']));
                $class = $activeIndex? 'active' : '';

                ?>
                <li  class="nav-item">
                    <a class="nav-link <?=$class?>" href="index.php">
                        <i class="fas fa-users"></i> Users
                        <?php if($activeIndex) { ?>
                        <span class="sr-only">(current)</span>
                        <?php } ?>
                    </a>
                </li>

                <?php
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
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

      </div>

    </div>
  </nav>

</header>