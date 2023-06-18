<!doctype html>
<html lang="<?= esc($data['locale']) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="<?=base_url()?>assets/libs/vue3/vue.global.js"></script>
    <!-- import CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/tailwind.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/libs/element-plus/element-plus-css.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    <!-- import JavaScript -->
    <script type="text/javascript" src="<?=base_url()?>assets/libs/element-plus/element-plus.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libs/element-plus/element-plus-icons.js"></script>
    <!-- import Axios -->
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <!-- import own JS files -->
    <script type="text/javascript" src="<?=base_url()?>assets/js/main.bundle.js"></script>
    <?= csrf_meta() ?>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <div class="horizontalMenu">
            <?= view($data['horizontalMenuView']) ?>
        </div>
        <div class="content flex">
            <div class="">
                <?= view($data['verticalMenuView']) ?>
            </div>
            <div class="flex justify-center w-full px-8">
                <?= view($data['pageView']) ?>
            </div>
        </div>
    </div>
</body>
</html>