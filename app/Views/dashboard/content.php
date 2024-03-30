<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <?php
        echo view('dashboard/widget/card');
        echo view('dashboard/widget/chart');
        echo view('dashboard/widget/invoice');
        echo view('dashboard/widget/message');
        ?>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin" class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
        </div>
    </div>

</div>
