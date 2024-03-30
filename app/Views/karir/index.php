<?php $this->extend('_layouts/main'); ?>

<?php $this->section('style'); ?>
<link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<?= view('karir/content') ?>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<?= view('karir/widget/datatable_js') ?>
<?php $this->endSection(); ?>