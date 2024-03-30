<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('karir/data'); ?>",
                "type": "GET"
            },
            "columns": [
                { "data": "title" },
                { "data": "description" },
                { "data": "requirement" },
                { "data": "note" },
                { "data": "expire" },
                { "data": "is_active" }
            ]
        });
    });
</script>
