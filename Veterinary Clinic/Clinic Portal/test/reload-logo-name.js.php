<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function refreshContent() {
        $.ajax({
            url: 'logo-and-name.php', // Replace with the actual PHP script that retrieves updated content
            method: 'GET',
            dataType: 'html',
            success: function(response) {
                $('#toRefresh').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error refreshing content:', status, error);
            }
        });
    }

    // Refresh content every 5 seconds
    setInterval(refreshContent, 500);
</script>