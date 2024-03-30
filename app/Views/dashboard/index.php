<?php $this->extend('_layouts/main'); ?>

<?php $this->section('style'); ?>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<?= view('dashboard/content') ?>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
<script src="<?= base_url('assets/js/demo/chart-bar-demo.js') ?>"></script>
<?php $this->endSection(); ?>