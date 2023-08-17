


// now its window load, planning to add axios for putt...

$(document).ready(function (){
    // dropdowns in menu
    $('.product-dropdown').click(function () {
        $('.product-dropdown-items').slideToggle();
    })
    $('.customers-dropdown').click(function () {
        $('.customers-dropdown-items').slideToggle();
    })
    $('.staff-dropdown').click(function () {
        $('.staffs-dropdown-items').slideToggle();
    })

    // LAYERS AUTOLOAD > ADD > EDIT

    // GET REQUESTS - AUTOLOAD

    // get suppliers

    // $('.append-supplier-msg').html('<div style="font-size: 30px; text-align: center"><div class="spinner-border" style="height: 30px; width: 30px"></div> Please wait...</div>')
    // $.get('/api/getsuppliers', function (res) {
    //     $('.append-supplier-msg').html('');
    //     res.forEach(element => {
    //         $('.append-supplier').append(`
    //             <tr>
    //                 <th scope="row">
    //                     <input type="checkbox" name="" id="">
    //                 </th>
    //                 <td>${element.suppliersName}</td>
    //                 <td>${element.suppliersPhoneNumber}</td>
    //                 <td>${element.suppliersEmail}</td>
    //                 <td>
    //                     <!-- Example single danger button -->
    //                     <div class="btn-group">
    //                         <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    //                         Action
    //                         </button>
    //                         <div class="dropdown-menu">
    //                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#supplierEdit${element.id}">Edit</a>
    //                         <a class="dropdown-item" href="#">Remove</a>
    //                     </div>

    //                     <!------------------------------------- EDIT MODAL --------------------------------------------->

    //                     <div class="modal fade" id="supplierEdit${element.id}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    //                         <div class="modal-dialog" role="document">
    //                             <div class="modal-content">
    //                             <div class="modal-header">
    //                             <h5 class="modal-title" id="exampleModalLabel">Edit ${element.suppliersName}</h5>
    //                                 <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
    //                                     <span aria-hidden="true">&times;</span>
    //                                 </button>
    //                             </div>
    //                             <div class="modal-body">
    //                                 <div class="msg"></div>
    //                                 <div class="form-group">
    //                                     <label for="">Supplier Name</label>
    //                                     <input type="text" name="" placeholder="Supplier 1..." class="form-control editSupplierName" value="${element.suppliersName}">
    //                                 </div>
    //                             </div>
    //                             <div class="modal-body">
    //                                 <div class="form-group">
    //                                     <label for="">Supplier Phone Number</label>
    //                                     <input type="number" name="" placeholder="09xxx..." class="form-control editSupplierPhone" value="${element.suppliersPhoneNumber}">
    //                                 </div>
    //                             </div><div class="modal-body">
    //                                 <div class="form-group">
    //                                     <label for="">Supplier Email</label>
    //                                     <input type="email" name="" placeholder="supplier@gmail.com" class="form-control editSupplierEmail" value="${element.suppliersEmail}">
    //                                 </div>
    //                             </div>
    //                             <div class="modal-footer">
    //                                 <button type="button" class="btn btn-success saveEditSupplier" data-id="${element.id}">Save <i class="fa fa-check"></i></button>
    //                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
    //                             </div>
    //                             </div>
    //                         </div>
    //                     </div>

    //                     <!------------------------------------- END EDIT MODAL --------------------------------------------->

    //                 </td>
    //             </tr>
    //         `)
    //     });

    //     // save edit supplier ---------------------------------------------------------------------------------

    //     $('.saveEditSupplier').click(function () {

    //         $('.msg').html('<div class="alert alert-info" style="font-size: 15px; text-align: left"><div class="spinner-border" style="height: 15px; width: 15px"></div> Adding supplier...</div>')

    //         let supplierName = $('.editSupplierName').val();
    //         let supplierPhone = $('.editSupplierPhone').val();
    //         let supplierEmail = $('.editSupplierEmail').val();

    //         // add supplier
    //         $.post('/api/editsupplier', {
    //             id: $(this).attr('data-id'),
    //             suppliersName: supplierName,
    //             suppliersPhoneNumber: supplierPhone,
    //             suppliersEmail: supplierEmail,
    //             _token: $('meta[name="csrf-token"]').attr('content')
    //         }, function (res) {
    //             // if success
    //             $('.msg').html(`<div class="alert alert-success" style="font-size: 15px; text-align: left"><i class="fa fa-check"></i> ${res}</div>`);
                
    //             setInterval(() => {
    //                 $('.msg').html(``);
    //             }, 5000);

                
    //             window.location.reload();
    //         })
                
    //     });
    //     // end save edit supplier  -----------------------------------------------------------------------------------

    // }).fail(err => {
    //     $('.append-supplier-msg').html(`<div class="alert alert-danger" style="font-size: 30px; text-align: center"><i class="fa fa-warning"></i> ${err.responseJSON.message}</div>`)

    //     console.log(err);
    // })

    // // END GET REQUESTS - AUTOLOAD

    // // REQUESTS - EVENTS

    // // add new supplier

    // $('.addSupplier').click(function () {

    //     $('.msg').html('<div class="alert alert-info" style="font-size: 15px; text-align: left"><div class="spinner-border" style="height: 15px; width: 15px"></div> Adding supplier...</div>')

    //     let supplierName = $('.supplierName').val();
    //     let supplierPhone = $('.supplierPhone').val();
    //     let supplierEmail = $('.supplierEmail').val();

    //     // add supplier
    //     $.post('/api/addsupplier', {
    //         suppliersName: supplierName,
    //         suppliersPhoneNumber: supplierPhone,
    //         suppliersEmail: supplierEmail,
    //         _token: $('meta[name="csrf-token"]').attr('content')
    //     }, function (res) {
    //         // if success
    //         $('.msg').html(`<div class="alert alert-success" style="font-size: 15px; text-align: left"><i class="fa fa-check"></i> ${res}</div>`);
            
    //         setInterval(() => {
    //             $('.msg').html(``);
    //         }, 5000);

    //         window.location.reload();
    //     }).fail(function (err){
    //         // if fail
    //         $('.msg').html(`<div class="alert alert-danger" style="font-size: 15px; text-align: left"><i class="fa fa-times"></i> ${err.responseJSON.message}</div>`);
    //         setInterval(() => {
    //             $('.msg').html(``);
    //         }, 5000);
    //     })
    // })

    // END  REQUESTS - EVENTS
})