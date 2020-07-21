<html>

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta charset="utf-8">
  <style>
    body {
      font-family: "dejavu sans", serif;
      font-size: 12px;
      color: #000;
    }
  </style>
  <title><?php echo $item->title ?></title>
</head>

<body>
  <?php echo $item->description ?>

  <?php foreach ($item->chapters as $chapter) { ?>
    <?php echo chapter_description($chapter) ?>
  <?php } ?>
</body>

</html>