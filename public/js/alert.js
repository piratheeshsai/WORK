import Swal from 'sweetalert2';
import './alert.css';
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
// Add event listener to the button
document.getElementById('update-btn').addEventListener('click', function(event) {
    // Prevent form from submitting immediately
    event.preventDefault();

    // Show SweetAlert confirmation
    Swal.fire({
        title: 'Are you sure you want to update this user?',
        text: "You can cancel the operation.",
        showDenyButton: true, // Show the "No" button
        showCancelButton: true, // Show the "Cancel" button
        confirmButtonText: 'Yes, update it!', // Text for the confirm button
        denyButtonText: 'No, cancel!', // Text for the deny button
        customClass: {
            actions: 'my-actions', // Custom class for button actions
            cancelButton: 'order-1 right-gap', // Custom class for cancel button
            confirmButton: 'order-2', // Custom class for confirm button
            denyButton: 'order-3', // Custom class for deny button
        },
    }).then((result) => {
        if (result.isConfirmed) {
            // If the user clicks "Yes"
            document.getElementById('update-form').submit(); // Submit the form
            Swal.fire('Updated!', 'User information has been updated.', 'success'); // Success message
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info'); // Info message
        }
    });
});
