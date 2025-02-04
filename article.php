<?php
if ($_COOKIE['login'] == '') {
  header('Location: /reg.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
  <?php
  $website_title = 'Додавання статті';
  require 'blocks/head.php';
  ?>
  <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
</head>

<body>
  <?php require 'blocks/header.php'; ?>

  <main class="container mt-5">
    <div class="row">
      <div class="col-md-8 mb-3">
        <h4>Додавання статті</h4>
        <form action="" method="post">
          <label for="title">Заголовок статті</label>
          <input type="text" name="title" id="title" class="form-control">

          <label for="intro">Інтро статті</label>
          <textarea name="intro" id="intro" class="form-control"></textarea>

          <label for="text">Текст статті</label>
          <textarea name="text" id="text" class="form-control"></textarea>

          <div class="alert alert-danger mt-2" id="errorBlock"></div>

          <button type="button" id="article_send" class="btn btn-success mt-3">
            Додати
          </button>
        </form>
      </div>

      <?php require 'blocks/aside.php'; ?>
    </div>
  </main>

  <?php require 'blocks/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
    CKEDITOR.replace('intro', {
      extraPlugins: 'pastefromword,pastefromgdocs',
      removePlugins: 'sourcearea'
    });
    CKEDITOR.replace('text', {
      extraPlugins: 'pastefromword,pastefromgdocs',
      removePlugins: 'sourcearea'
    });

    $('#article_send').click(function () {
      var title = $('#title').val();
      var intro = CKEDITOR.instances.intro.getData(); 
      var text = CKEDITOR.instances.text.getData(); 

      $.ajax({
        url: 'ajax/add_article.php',
        type: 'POST',
        cache: false,
        data: { 'title': title, 'intro': intro, 'text': text },
        dataType: 'html',
        success: function (data) {
          if (data == 'Готово') {
            $('#article_send').text('Все готово');
            $('#errorBlock').hide();
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data);
          }
        }
      });
    });
  </script>
</body>

</html>