<!DOCTYPE html>
<html lang="uk">

<head>
  <?php
  $website_title = 'PHP блог';
  require 'blocks/head.php';
  ?>
</head>

<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <?php
        require_once 'mysql_connect.php';

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
          $title = htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8');
          $intro = htmlspecialchars_decode($row->intro, ENT_QUOTES);
          $author = htmlspecialchars($row->avtor, ENT_QUOTES, 'UTF-8');

          echo "<h2>$title</h2>
              <p>$intro</p> 
              <p><b>Автор статті:</b> <mark>$author</mark></p>
              <a href='/news.php?id=$row->id' title='$title'>
                <button class='btn btn-warning mb-5'>Прочитати більше</button>
              </a>";
        }
        ?>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
</body>

</html>