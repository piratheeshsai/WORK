// Custom JavaScript can be added here

// Example: Confirm delete action
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('btn btn-danger');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            if (!confirm('Are you sure you want to delete this user?')) {
                event.preventDefault();
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Add click event listener to each row
    const rows = document.querySelectorAll('.clickable-row');
    rows.forEach(function (row) {
        row.addEventListener('click', function () {
            // Redirect to the user details page on row click
            window.location = this.dataset.href;
        });
    });
});






