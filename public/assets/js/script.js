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

    // checkbox - products

    var clickedProd = false;
    $(".checkallproducts").on("click", function() {
    $(".checkproducts").prop("checked", !clickedProd);
        clickedProd = !clickedProd;
        this.innerHTML = clickedProd ? 'Deselect' : 'Select';
    });

    //--> delete

    $('.delProd').click(function () {
        let array = [];
        $(".checkproducts:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        $.post('/api/deleteproduct', {
            ids: array,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            console.log(res)
            $('.msg').show();
            $('.msg').text(res);
            window.location.reload();
        })
    })

    //--> cart

    let localCartStorage = JSON.parse(localStorage.getItem('inventory_management_system_cart'));
    if  (!localCartStorage) { localCartStorage = [] }

    $('.cart').click(function () {
        let array = [];
        $(".checkproducts:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        let localCartStorage = JSON.parse(localStorage.getItem('inventory_management_system_cart'));
        if  (!localCartStorage) { localCartStorage = [] }

        array.forEach(element => {
            if (!localCartStorage.includes(element))  {
                localCartStorage.unshift(element);
            }
            localStorage.setItem('inventory_management_system_cart', JSON.stringify(localCartStorage))
            window.location.reload();

        });
    })

    $('.cartCount').html(localCartStorage.length);

    // carttoggle

    $('.cart-toggle').click(function() {
        $('.cart-dropdown').slideToggle();
    })

    // clear cart

    $('.clearCart').click(function () {
        localCartStorage = [];
        localStorage.setItem('inventory_management_system_cart', JSON.stringify(localCartStorage))
        window.location.reload();

    })

    // checkbox - productcategory

    var clickProdCateg = false;
    $(".checkallproductcateg").on("click", function() {
    $(".checkproductcateg").prop("checked", !clickProdCateg);
        clickProdCateg = !clickProdCateg;
        this.innerHTML = clickProdCateg ? 'Deselect' : 'Select';
    });
    $('.delProdCateg').click(function () {
        let array = [];
        $(".checkproductcateg:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        $.post('/api/deleteproductcateg', {
            ids: array,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            console.log(res)
            $('.msg').show();
            $('.msg').text(res);
            window.location.reload();
        })
    })

    // checkbox - productcategory

    var clickProdCateg = false;
    $(".checkallproductfailure").on("click", function() {
    $(".checkproductfailure").prop("checked", !clickProdCateg);
        clickProdCateg = !clickProdCateg;
        this.innerHTML = clickProdCateg ? 'Deselect' : 'Select';
    });
    $('.delProdFailure').click(function () {
        let array = [];
        $(".checkproductfailure:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        $.post('/api/deleteproductfailure', {
            ids: array,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            console.log(res)
            $('.msg').show();
            $('.msg').text(res);
            window.location.reload();
        })
    })

    // checkbox - supplier

    var clickSuppliers = false;
    $(".checkallsuppliers").on("click", function() {
    $(".checksuppliers").prop("checked", !clickSuppliers);
        clickSuppliers = !clickSuppliers;
        this.innerHTML = clickSuppliers ? 'Deselect' : 'Select';
    });
    $('.delSupplier').click(function () {
        let array = [];
        $(".checksuppliers:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        $.post('/api/deletesupplier', {
            ids: array,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            console.log(res)
            $('.msg').show();
            $('.msg').text(res);
            window.location.reload();
        })
    })

    // checkbox - customers

    var clickCustomers = false;
    $(".checkallcustomers").on("click", function() {
    $(".checkcustomers").prop("checked", !clickCustomers);
        clickCustomers = !clickCustomers;
        this.innerHTML = clickCustomers ? 'Deselect' : 'Select';
    });
    $('.delCustomer').click(function () {
        let array = [];
        $(".checkcustomers:checked").each(function() {
            array.push($(this).attr('data-id'));
        });

        $.post('/api/deletecustomer', {
            ids: array,
            _token: $('meta[name="csrf-token"]').attr('content')
        }, function (res) {
            console.log(res)
            $('.msg').show();
            $('.msg').text(res);
            window.location.reload();
        })
    })
})
