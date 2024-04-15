$(document).ready(function() {
    // Function to handle filtering
    function filterUsers() {
        var formData = $('#filterForm').serialize(); // Serialize form data

        $.ajax({
            url: 'filter.php', // Provide the correct path to your server-side script
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#userTable tbody').html(response); // Replace the table body with the filtered data
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Trigger filtering on change of filter form fields
    $('#filterArea, #occupation').on('change', filterUsers);

    // Initial filtering on page load
    filterUsers();
});

// $(document).ready(function () {
//   $("#filterForm").on("submit", function (event) {
//     event.preventDefault(); // Prevent default form submission

//     var formData = $(this).serialize(); // Serialize form data

//     $.ajax({
//       url: "filter.php", // Specify the URL of your server-side script
//       method: "POST",
//       data: formData,
//       success: function (response) {
//         $("#userTable tbody").html(response); // Update the table body with the filtered data
//       },
//       error: function (xhr, status, error) {
//         console.error(error);
//       },
//     });
//   });
// });
