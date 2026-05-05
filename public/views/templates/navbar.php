<nav class="navbar bg-primary">
  <div class="container-fluid justify-content-between text-light fs-5 ms-3 me-4">
    <ul class="d-flex flex-row list-unstyled">
      <li>
        <a class="navbar-brand text-white" href="#">
          <img src="/image/logo.png" alt="Logo" class="img-fluid d-inline-block" style="max-width: 70px; height: auto;">
        </a>
      </li>
    </ul>

    <?php if(isset($_SESSION["user_name"])): ?>
      <ul class="d-flex flex-row list-unstyled gap-3">
        <li>
          Olá, <strong class="text-warning"><?php echo $_SESSION["user_name"] ?></strong>
        </li>
        <li>
          <a href="" class="text-light">
            <i class="fa-solid fa-right-from-bracket" role="button"></i>
          </a>
        </li>
      </ul>
    <?php endif ?>
  </div>
</nav>