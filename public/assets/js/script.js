$(document).ready(function (){
    // dropdowns in menu
    // $('.product-dropdown').click(function () {
    //     $('.product-dropdown-items').slideToggle();
    // })
    // $('.customers-dropdown').click(function () {
    //     $('.customers-dropdown-items').slideToggle();
    // })
    // $('.staff-dropdown').click(function () {
    //     $('.staffs-dropdown-items').slideToggle();
    // });

    // add new category

    $('.saveCategory').click(function(e) {
        e.preventDefault();
        let categoryName = $('.categoryName').val();
        let categoryDescription = $('.categoryDescription').val();
        let categoryPackaging = $('.categoryPackaging').val();

        if  (!categoryName || !categoryDescription || !categoryPackaging) {
            // message
            $('.msg').html('<p class="alert alert-danger">Incomplete details.</p>');
            setInterval(() => {
                $('.msg').html('');
            }, 5000);
        } else {
            $.post('api/addcategoryonproductadd', {
                categoryName: categoryName,
                categoryDescription: categoryDescription,
                categoryPackaging: categoryPackaging,
                _token: $('meta[name="csrf-token"]').attr('content')
            }, function (res) {
                // message
                $('.msg').html(`<p class="alert alert-success">${res}</p>`);
                setInterval(() => {
                    $('.msg').html('');
                }, 5000);
                $.get('api/loadproductcategories', function (res) {
                    res.forEach(category => {
                        $('.productCategorySelect').append(`
                            <option value="${category.id}">${category.categoryName}</option>
                        `);
                    });

                    $('.categoryName').val("");
                    $('.categoryDescription').val("");
                    $('.categoryPackaging').val("");
                })
            }).fail(function (err) {
                $('.msg').html(`<p class="alert alert-danger">${err.responseJSON.message}</p>`);
            })
        }
    })

    // add new supplier

    $('.saveSupplier').click(function(e) {
        e.preventDefault();
        let suppliersName = $('.suppliersName').val();
        let suppliersPhoneNumber = $('.suppliersPhoneNumber').val();
        let suppliersEmail = $('.suppliersEmail').val();

        if  (!suppliersName || !suppliersPhoneNumber || !suppliersEmail) {
            // message
            $('.msg').html('<p class="alert alert-danger">Incomplete details.</p>');
            setInterval(() => {
                $('.msg').html('');
            }, 5000);
        } else {
            $.post('api/addsupplieronproductadd', {
                suppliersName: suppliersName,
                suppliersPhoneNumber: suppliersPhoneNumber,
                suppliersEmail: suppliersEmail,
                _token: $('meta[name="csrf-token"]').attr('content')
            }, function (res) {
                // message
                $('.msg').html(`<p class="alert alert-success">${res}</p>`);
                setInterval(() => {
                    $('.msg').html('');
                }, 5000);
                $.get('api/loadproductsuppliers', function (res) {
                    res.forEach(supplier => {
                        $('.suppliersSelect').append(`
                            <option value="${supplier.id}">${supplier.suppliersName}</option>
                        `);
                    });
                    $('.suppliersName').val("");
                    $('.suppliersPhoneNumber').val("");
                    $('.suppliersEmail').val("");
                })
            }).fail(function (err) {
                $('.msg').html(`<p class="alert alert-danger">${err.responseJSON.message}</p>`);
            })
        }
    })
})