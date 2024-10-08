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
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#createSubsectionModal').modal('hide'); // Hide the modal
                alert('Subsection added successfully!');
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Log the error response
                alert('An error occurred while adding the subsection.');
            }
        });
    });

    // Handle the submission of the department form
    $('#createDepartmentForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: createDepartmentUrl, // Ensure this route is correct
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#createDepartmentModal').modal('hide'); // Hide the modal
                alert('Department added successfully!');
                $('#subsectionDepartments' + response.subsection_id).append(`<li>${response.department.name}</li>`);
            },
            error: function (xhr) {
                console.log(xhr.responseText); // Log the error response
                alert('An error occurred while adding the department.');
            }
        });
    });

    // Set subsection_id when creating a department
    $(document).on('click', '.createDepartmentBtn', function () {
        var subsectionId = $(this).data('subsection-id');
        $('#subsection_id').val(subsectionId);
    });

    // Edit Section Head
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
});
