///delete department

$(document).ready(function() {
    // Use class selector to handle multiple delete buttons
    $('.delete-btn').on('click', function(event) {
        event.preventDefault(); // Prevent form from submitting immediately

        var form = $(this).closest('form'); // Get the specific form for this button

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the specific form
                form.submit();
                Swal.fire('Deleted!', 'The department has been deleted.', 'success');
            }
        });
    });
});


///delete the subsection

$(document).on('click', '.deleteSubsectionBtn', function(event) {
    event.preventDefault();
    var form = $(this).closest('form');

    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire('Deleted!', 'The subsection has been deleted.', 'success');
        }
    });
});





$(document).ready(function () {
    // Handle the submission of the subsection form
    $('#createSubsectionForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: createSubsectionUrl, // Ensure this route is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Set the CSRF token
            },
            success: function (response) {
                $('#createSubsectionModal').modal('hide'); // Hide the modal
                alert('Subsection added successfully!');
                // Optionally, update the UI to show the new subsection
                // For example, you can append it to a list or table here
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Log the error response
                alert('An error occurred while adding the subsection.');
                // Optionally, handle validation errors here
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    const errorMessage = Object.values(errors).flat().join('\n');
                    alert(errorMessage); // Show validation error messages
                }
            }
        });
    });
});







$(document).on('click', '.createDepartmentBtn', function () {
    var subsectionId = $(this).data('subsection-id');
    $('#subsection_id').val(subsectionId); // Set the subsection_id in the hidden input
});

// Handle form submission
// Set subsection ID when opening the modal
$('#createDepartmentModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var subsectionId = button.data('subsection-id'); // Extract subsection ID
    $('#createDepartmentForm').find('input[name="subsections_id"]').val(subsectionId); // Set hidden input value
});

// Handle form submission with AJAX
$('#createDepartmentForm').submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    $.ajax({
        url: createDepartmentUrl, // Make sure this URL is defined in your script
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#createDepartmentModal').modal('hide'); // Close the modal
            alert('Department added successfully!');
            // Append the new department to the list of departments for the subsection
            $('#subsectionDepartments' + response.subsection_id).append(`<li>${response.department.name}</li>`);
        },
        error: function (xhr) {
            console.log(xhr.responseText); // Log error for debugging
            alert('An error occurred while adding the department.');
        }
    });
});




    $('.editSectionHeadBtn').click(function () {
        var subsectionId = $(this).data('subsection-id');
        var sectionHead = $(this).data('section-head');
        $('#edit_subsection_id').val(subsectionId);
        $('#section_head').val(sectionHead);
    });

    $('#editSectionHeadForm').submit(function (e) {
        e.preventDefault();
        var subsectionId = $('#edit_subsection_id').val();
        var sectionHead = $('#section_head').val();

        $.ajax({
            url: editSectionHeadUrl, // Update with correct route
            type: 'PUT',
            data: {
                subsection_id: subsectionId,
                section_head: sectionHead,
                _token: csrfToken
            },
            success: function (response) {
                alert('Section head updated successfully!');
                location.reload(); // Reload the page to see the changes
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('An error occurred while updating the section head.');
            }
        });
    });

    // Edit Department
    $('.editDepartmentBtn').click(function () {
        var departmentId = $(this).data('department-id');
        var departmentName = $(this).data('department-name');
        $('#edit_department_id').val(departmentId);
        $('#department_name').val(departmentName);
    });

    $('#editDepartmentForm').submit(function (e) {
        e.preventDefault();
        var departmentId = $('#edit_department_id').val();
        var departmentName = $('#department_name').val();

        $.ajax({
            url: editDepartmentUrl, // Corrected the route
            type: 'PUT',
            data: {
                department_id: departmentId,
                name: departmentName,
                _token: csrfToken
            },
            success: function (response) {
                alert('Department updated successfully!');
                location.reload(); // Reload the page to see the changes
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('An error occurred while updating the department.');
            }
        });
    });

