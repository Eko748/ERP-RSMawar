<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('_layouts/header'); ?>
    <?= $this->renderSection('style') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?= view('_layouts/sidebar'); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= view('_layouts/topbar'); ?>
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
            <?= view('_layouts/footer'); ?>
        </div>
    </div>
    <?= view('_layouts/script'); ?>
    <?= $this->renderSection('script') ?>
</body>

</html>