<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('absensi/data'); ?>",
                "type": "GET"
            },
            "columns": [
                { "data": "longitude" },
                { "data": "latitude" },
            ]
        });
    });
</script>
