$(document).ready(function () {
    function loadCategories() {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8000/api/categoriesajax',
            dataType: 'json',
            success: function (res) {
                console.log(res);
                var startStt = 1; 
                $('#category-table-body').empty()
                res.forEach(function (category, index) {
                    $('#category-table-body').append(`
                        <tr>
                            <td>${startStt + index}</td>
                            <td>${category.name}</td>
                            <td>${category.slug}</td>
                            <td>${category.description}</td>
                            <td>${category.content}</td>
                        </tr>
                    `);
                });
            }
        });
    }

    $('#load-categories').click(function () {
        loadCategories(); 
    });

    $('#add-category-button').click(function () {
        $('#addCategoryModal').modal('show'); 
    });

    $('#add-category-form').submit(function (event) {
        event.preventDefault(); 
        var formData = $(this).serialize(); 
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/categoriesajax/store',
            data: formData, // Dữ liệu của form
            dataType: 'json',
            success: function (response) {
                $('#addCategoryModal').modal('hide');
                loadCategories(); 
                document.getElementById("add-category-form").reset();
            }
        });
    });
});
