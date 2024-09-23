var hamburgerBtn = document.querySelector('.hamburger-btn');
var sideBar = document.querySelector('.sidebar');

hamburgerBtn.addEventListener('click', sidebarToggle);
function sidebarToggle() {
  sideBar.classList.toggle('active');
};

// const categorySelect = document.getElementById('category');
// const facultyDepartments = document.getElementById('facultyDepartments');
// const administrationDepartments = document.getElementById('administrationDepartments');
// const centerDepartments = document.getElementById('centerDepartments');
// const otherDepartments = document.getElementById('otherDepartments');

// categorySelect.addEventListener('change', function () {
//     const selectedCategory = categorySelect.value;

//     // Hide all department selects initially
//     facultyDepartments.style.display = 'none';
//     administrationDepartments.style.display = 'none';
//     centerDepartments.style.display = 'none';
//     otherDepartments.style.display = 'none';

//     // Show the correct department select based on category
//     if (selectedCategory === 'faculty') {
//         facultyDepartments.style.display = 'block';
//     } else if (selectedCategory === 'administration') {
//         administrationDepartments.style.display = 'block';
//     } else if (selectedCategory === 'centers') {
//         centerDepartments.style.display = 'block';
//     } else if (selectedCategory === 'other') {
//         otherDepartments.style.display = 'block';
//     }
// });
document.addEventListener('DOMContentLoaded', function () {
    // Event listener for section change
    document.getElementById('section').addEventListener('change', function () {
        const sectionId = this.value;

        fetch(`/user/get-subsections/${sectionId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Subsections data:', data);

                const subsectionsSelect = document.getElementById('subsections');
                subsectionsSelect.innerHTML = '<option value="" disabled selected>Select Subsection</option>';

                data.forEach(subsection => {
                    const option = document.createElement('option');
                    option.value = subsection.id;
                    option.textContent = subsection.name;
                    option.setAttribute('data-head', subsection.section_head); // Assuming section_head is part of the data
                    subsectionsSelect.appendChild(option);
                });

                document.getElementById('subsectionsContainer').style.display = 'block';
            })
            .catch(error => console.error('Error fetching subsections:', error));
    });

    // Event listener for subsection change
    document.getElementById('subsections').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const sectionHead = selectedOption.getAttribute('data-head');
        document.getElementById('section_head').value = sectionHead || ''; // Set the section head input value

        const subsectionsId = this.value;

        fetch(`/user/get-departments/${subsectionsId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Network response was not ok: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Departments data:', data);

                const departmentsSelect = document.getElementById('departments');
                departmentsSelect.innerHTML = '<option value="" disabled selected>Select Department</option>';

                data.forEach(department => {
                    const option = document.createElement('option');
                    option.value = department.id;
                    option.textContent = department.name;
                    departmentsSelect.appendChild(option);
                });

                document.getElementById('departmentsContainer').style.display = 'block';
            })
            .catch(error => console.error('Error fetching departments:', error));
    });
});
