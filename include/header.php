<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
    <div class="container-fluid">
      <!-- Navbar Brand -->
      <a class="navbar-brand p-3 brand-effect" href="user_login.php">
        <h3 class="brand-text">Bidtrade</h3>
      </a>

      <!-- Toggler for Mobile View -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links Centered -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item px-4">
            <a class="nav-link text-uppercase text-lightblue hover-effect" href="../index.php">Home</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link text-uppercase text-lightblue hover-effect" href="about.php">About</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link text-uppercase text-lightblue hover-effect" href="contact.php">Contact</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link text-uppercase text-lightblue hover-effect" href="../user/user_product.php">My Product</a>
          </li>
          <li class="nav-item px-4">
            <a class="nav-link text-uppercase text-lightblue hover-effect" href="../user/user_inbox.php">Inbox</a>
          </li>
        </ul>
      </div>

      <!-- Login and Register Buttons -->
      <div class="d-flex">
        <?php if(!isset($_SESSION["email"])){ ?>
          <button class="btn custom-btn me-2" onclick="document.location='user_login.php'">Login</button>
          <button class="btn custom-btn" onclick="document.location='user_regis.php'">Register</button>
        <?php }else{ ?>
          <div class="dropdown">
            <a class="btn btn-body dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src = "../<?php echo !empty($_SESSION["profile_pic"]) ? "profile_pic/".$_SESSION["profile_pic"] : "include/profile1.png"; ?>" style = "width: 50px; height: 50px;" class = "rounded-circle">
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="../user/user.php?setting">Settings</a></li>
              <li><a class="dropdown-item border-top" href="../code.php?logout=<?php echo $_SESSION["email"]; ?>">Logout</a></li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
  </nav>
</header>