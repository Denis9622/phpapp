<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Ideas Burner</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="/">Головна</a>
    <a class="p-2 text-dark" href="/contacts.php">Контакти</a>
    <?php
      if($_COOKIE['login'] != '')
        echo '<a class="p-2 text-dark" href="/article.php">Додати статтю</a>';
    ?>
  </nav>
  <?php
    if($_COOKIE['login'] == ''):
  ?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Ввійти</a>
  <a class="btn btn-outline-primary mb-2" href="/reg.php">Реєстрація</a>
  <?php
    else:
  ?>
  <a class="btn btn-outline-primary mb-2" href="/auth.php">Кабінет користувача
</a>
  <?php
    endif;
  ?>
</div>
