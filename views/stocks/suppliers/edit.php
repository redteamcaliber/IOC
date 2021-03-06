<form class="form-horizontal">
    <fieldset>
        <legend>Search suppliers</legend>
        <div class="form-group">
            <div class="col-lg-5">
                <input type="text" class="form-control" id="searchInput" placeholder="filter">
            </div>
        </div>
    </fieldset>
</form>

<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Product</th>
            <th>Contact</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="fbody">
    </tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel"><legend>Edit entry</legend></h4>

            </div>
            
            <div class="modal-body">
   
    <form class="form-horizontal" id="edit_supplier_form" action="stocks/editSupplier" method="post">
    <fieldset>
        <div class="form-group">
        <label for="sup-name" class="col-lg-2 control-label">Supplier name</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" id="sup-name" placeholder="supplier name" name="sup-name">
        </div>
        </div>
          
          <!--<div class="form-group">
                <label for="products" class="col-lg-2 control-label">Products</label>
                <div class="col-lg-10" id="products">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" class="fuel" id="fuel-checkbox" id="fuel-checkbox" name="fuel-sup"> Fuel
                        </label>
                    </div>
                    <div class="checkbox">
                        <label id="lubricantx">
                            <input type="checkbox" name="lubricant-sup" id="lubricant-checkbox"> Lubricants
                        </label>
                    </div>
                </div>
            <br/>
          </div> -->
          <!-- <div class="form-group" id="qnty-div">
            <label for="tel-number" class="col-lg-2 control-label">Quantity</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" id="sup-quantity" placeholder="quantity" name="sup-tel-number">
            </div>
            </div>
          -->
          <div class="form-group">
            <label for="sup-email" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-7">
                <input type="email" class="form-control" id="sup-email" placeholder="email" name="sup-email">
            </div>
          </div>
            <div class="form-group">
            <label for="sup-contact" class="col-lg-2 control-label">Contact no</label>
            <div class="col-lg-7">
                <input type="number" class="form-control" id="sup-contact" placeholder="contact no" name="sup-contact">
            </div>    
            </div>
            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="edit_sub" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </fieldset>
        </form>
    </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel"><legend>Send email</legend></h4>

            </div>
            
            <div class="modal-body">
   
    <form class="form-horizontal" id="edit_supplier_form" action="stocks/emailSupplier" method="post">
    <fieldset>
        <div class="form-group">
        <label for="sup-name" class="col-lg-2 control-label">To</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" id="to" placeholder="to" name="to" disabled="">
        </div>
        </div>
          <div class="form-group">
            <label for="sup-email" class="col-lg-2 control-label">Subject</label>
            <div class="col-lg-7">
                <input type="email" class="form-control" id="subject" placeholder="subject" name="subject">
            </div>
          </div>
            <div class="form-group">
            <label for="sup-contact" class="col-lg-2 control-label">Message</label>
            <div class="col-lg-7">
                <input type="textarea" class="form-control" id="message" placeholder="message" name="message">
            </div>    
            </div>
            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="email_sup" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </fieldset>
        </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $.getJSON('stocks/loadLubricantsSuppliers',function(data){
            console.log(data[0]);

            var len = data.length;
            for(x=0;x<len;x++){
                $("tbody").append('<tr class="' + x +'">');
                $("." + x + "").append('<td id="' + data[x].Id + "-name" + '">' + data[x].name + '</td>');
                $("." + x + "").append('<td id="' + data[x].Id + "-product" + '">' + data[x].product + '</td>');
                $("." + x + "").append('<td id="' + data[x].Id + "-contact" + '">' + data[x].contact + '</td>');
                $("." + x + "").append('<td id="' + data[x].Id + "-email" + '">' + data[x].email + '</td>');
                $("." + x + "").append('<td><div class="icon-preview"><a href="' + data[x].Id + '" class="sendEmail"><i class="mdi-content-mail"></i></a></div></td>');
                $("." + x + "").append('<td><div class="icon-preview"><a href="' + data[x].Id + '" class="edit"><i class="mdi-content-create"></i></a></div></td>');
                $("." + x + "").append('<td><div class="icon-preview"><a href="' + data[x].Id + '" class="remove"><i class="mdi-content-remove-circle"></i></a></div></td>');
                $("." + x + "").append('</tr>');
            }
            
            $('.remove').click(function(e){
                var id = $(this).attr('href');
                e.preventDefault();
                swal({   title: "Are you sure?",   
                    text: "You will not be able to recover this entry",   
                    type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel !",   
                    closeOnConfirm: false,   closeOnCancel: false }, 
                    function(isConfirm){   
                        if (isConfirm) {     
                            swal("Deleted!", "Entry deleted !.", "success");   
                            
                            $.post('stocks/removeLubricantSupplier', { ID : id }, function(data){
                                console.log(data);
                                $('#subloader2').empty();
                                $('#subloader2').load('/IOC/stocks/edit_suppliers',function(){
                                    $('#subloader2').hide();
                                    $('#subloader2').fadeIn('slow');
                                });
                            });
                        } 
                            else {    
                             swal("Cancelled", "", "error");   
                            } 
                    });

                // e.preventDefault();
                // var id = $(this).attr('href');
                // $.post('stocks/removeLubricantSupplier', { ID : id }, function(data){
                //     console.log(data);
                //     alert('Done !');
                //     $('#subloader2').empty();
                //     $('#subloader2').load('/IOC/stocks/edit_suppliers',function(){
                //         $('#subloader2').hide();
                //         $('#subloader2').fadeIn('slow');
                //     });
                // });

            });

            $('.edit').click(function(e){
                e.preventDefault();
                var id = $(this).attr('href');
                window.editID = id;
                $('#myModal').modal('show');
                setTimeout(function(){
//                    $('#supplier').empty();
                    var name = $('#'+ id +'-name').text();
                    //var product = $('#'+ id +'-product').text();
                    var contact = $('#'+ id +'-contact').text();
                    var email = $('#'+ id +'-email').text();

                    $('#sup-name').val(name);
                    $('#sup-email').val(email);
                    $('#sup-contact').val(contact);
                    //$('#supplier').val(supplier);
                },250);
                
            });
            $(".sendEmail").click(function(e){
                e.preventDefault();
                $("#myModal2").modal('show');
                var id = $(this).attr('href');
                setTimeout(function(){
                    var to = $('#'+ id +'-email').text();
                    $("#to").val(to);
                },250);
            });

            $("#email_sup").click(function(){
                var to = $("#to").val();
                var subject = $("#subject").val();
                var message = $("#message").val();
                $.post('stocks/emailSupplier', { email : to , subject : subject , message : message }, function(data){
                    if(!data){
                        swal("Something went wrong try again !", "click okay to continue", "success");
                    }
                    else{
                        console.log(data);
                        swal("Email sent !", "click okay to continue", "success");
                        $('#subloader2').empty();
                        $('#subloader2').load('/IOC/stocks/edit_suppliers',function(){
                            $('#subloader2').hide();
                            $('#subloader2').fadeIn('slow');
                        });
                    }
                });
            }); 
  
            $('#edit_sub').click(function(){
                var sup_ID = window.editID;
                var sup_name = $('#sup-name').val();
                var sup_email = $('#sup-email').val();
                var sup_contact = $('#sup-contact').val();
                //var sup_products = $('#supplier').val();


                if(sup_name == ""){
                    swal("Oops !", "Please fill name field");
                    return false;
                }
                if(sup_name.length>=30){
                    swal("Oops !", "Name filed should be less than 30 characters")  
                    return false;
                }
                if(sup_email == ""){
                    swal("Oops !", "Please fill email field");
                    return false;
                }
                
                if(!validateEmail(sup_email)){
                    swal("Oops !", "Invalid email");
                    return false;   
                }
                if(!validateContact(sup_contact) || sup_contact == ""){
                    swal("Oops !", "Invalid contact number !");
                    return false;
                }
                // function validateName(name){
                //     var name = $(this).val();
                //     if(/[A-Z]/.test(name[0])){
                    
                //     }
                //     else{
                //         swal("Oops !", "First letter should be capital");    
                //     }
                // }
                function validateContact(contact){
                    if(!contact.match(/^\d{10}$/)){
                        //console.log('Nope !');
                        return false;
                    }
                    else{
                        //console.log('Match ');
                        return true;
                    }
                }
                function validateEmail(email){
                    if(!email.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)){
                        return false;
                    }
                    else{
                        return true;            
                    }
                }
                //console.log(sup_ID+sup_name+sup_email+sup_contact);
                $.post('stocks/editSupplier',{ name : sup_name , email : sup_email , contact : sup_contact , id : sup_ID },function(data){
                    console.log(data);
                    $('#myModal').hide();
                    $('#subloader2').load('/IOC/stocks/edit_suppliers',function(){
                        $('#subloader2').hide();
                        $('#subloader2').fadeIn('fast');
                    });
                });
            });
                  
        });

        
    });
    $("#searchInput").keyup(function () {
        //split the current value of searchInput
        var data = this.value.split(" ");
        //create a jquery object of the rows
        var jo = $("#fbody").find("tr");
        if (this.value == "") {
            jo.show();
            return;
        }
        //hide all the rows
        jo.hide();

        //Recusively filter the jquery object to get results.
        jo.filter(function () {
            var $t = $(this);
            for (var d = 0; d < data.length; ++d) {
                if ($t.is(":contains('" + data[d] + "')")) {
                    return true;
                }
            }
            return false;
        })
        //show the rows that match.
        .show();
    });
</script>