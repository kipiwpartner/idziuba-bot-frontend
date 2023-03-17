<!doctype html>
<html lang="<?= esc($data['locale']) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="<?=base_url()?>assets/js/libs/vue3/vue.global.js"></script>
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-plus/dist/index.css">
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-plus"></script>
    <script src="https://unpkg.com/@element-plus/icons-vue"></script>
    <!-- import owns files -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    <script type="text/javascript" src="<?=base_url()?>assets/js/main.bundle.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <?= view($data['partialMenuView']) ?>
        <div class="content" style="width: 50%">
            <?= view($data['pageView']) ?>
        </div>
    </div>
</body>
</html>