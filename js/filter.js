$(document).ready(function() {
    function filterUsers() {
        var formData = $('#filterForm').serialize();

        $.ajax({
            url: 'filter.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#userTable tbody').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    $('#filterArea, #occupation').on('change', filterUsers);
    filterUsers();
});
