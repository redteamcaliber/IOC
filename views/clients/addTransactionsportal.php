<h3 class="text-success"><strong>Client Transaction Portal</strong></h3>

<form class="form-horizontal" method="post" action="clients/insertTranactions" id="clienttrasactions">
    <fieldset>
        <br>
        <div class="form-group">
            <label for="shiftid" class="col-lg-2 control-label">Client ID</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" id="client_id" placeholder="Client ID OR Name" name="client_id">
            </div>
        </div>
        <div class="form-group">
            <label for="shiftname" class="col-lg-2 control-label">Client Name</label>
            <div class="col-lg-7">
               <!-- <input type="text" class="form-control" id="client_name" placeholder="" name="client_name"  pattern="[A-Z]{1}[a-z]{1,}" title= "Use Only Letters Eg : Ioc"  >   -->
                <select id="cliName" class="form-control" name="cliName" onchange="loadnum()" required>
                <option></option>
                </select>
            </div>
             <input type="hidden" id="client_name" name="client_name">
        </div>
        <div class="form-group">
            <label for="shiftname" class="col-lg-2 control-label">Pump Vehicle Number</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" id="client_pump_vechicle" placeholder="HA-5676" name="client_pump_vechicle"  pattern="[A-Z-]{1,3}[0-9]{4,7}" title="CA-8908">
            </div>
        </div>
        
         <div class="form-group">
            <label for="shiftrate" class="col-lg-2 control-label">Client Pump by</label>
            <div class="col-lg-7">
                <select id="shiftcolor"  class="form-control" name="client_pump_by" id="client_pump_by">
                <option>Gayan</option>
                <option>Sunil</option>
                <option>Rathnayake</option>
                <option>Perera</option>
                </select>
            </div>
         </div>
      
        <div class="form-group">
            <label for="pump_date" class="col-lg-2 control-label">Pump Date</label>
            <div class="col-lg-7">
                <input type="date" class="form-control" id="pump_date" placeholder=" " name="pump_date" pattern="" max="">
            </div>
        </div> 
        <div class="form-group">
            <label for="shiftrate" class="col-lg-2 control-label">Fuel Type</label>
            <div class="col-lg-7">
                <select id="shiftcolor"  class="form-control" name="fuelType" id="fuelType" >
                <option>Fuel Type</option>
                <option>Petrol</option>
                <option>Diesel</option>
                <option>Gas</option>
                </select>
            </div>
        </div> 
        <div class="form-group">
            <label for="shiftcolor" class="col-lg-2 control-label">Pump Number</label>
            <div class="col-lg-7">
                <select id="shiftcolor"  class="form-control" name="client_pump_no" id="client_pump_no" >
                    <option>Pump 1</option>
                    <option>Pump 2</option>

                </select>
                <input type="hidden" id="client_input" name="client_input">
            </div>
        </div>
        <div class="form-group">
            <label for="shiftrate" class="col-lg-2 control-label">Pump Liters</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" placeholder=" " id="client_pump_liters"  name="client_pump_liters" title="Eg : 0 to 1000" >
            </div>
        </div> 
        
        <div class="form-group">
            <label for="shiftrate" class="col-lg-2 control-label">Pump Value</label>
            <div class="col-lg-7">
                <input type="text" class="form-control" placeholder="Rs: " id="client_pump_value"  name="client_pump_value" title="Eg : 0 to 1000" >
            </div>
        </div>       
        
        
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>	
    </fieldset>
</form>
</div>


<script>
     $('#clienttrasactions').submit(function (e) {
        e.preventDefault();
 

//        var client_id=$('#client_id').val();
//        var client_name=$('#client_name').val();
//        var client_pump_vechicle=$('#client_pump_vechicle').val();
//        var pump_date=$('#pump_date').val();
//        var fuleType=$('#fuelType').val();
//        var client_pump_no=$('#client_pump_no').val();
//        var amount=$('#client_pump_value').val();
//        var client_pumper=$('#client_pump_by').val();
//        var client_pump_liters=$('#client_pump_liters').val();
//     
//    if(client_id == "" || client_name == "" || client_pump_vechicle == "" || pump_date == "" || fuleType == "" || client_pump_no == "" || amount == "" || client_pumper == "" || client_pump_liters ="" )
//    {
//            swal("Oops !", "Please fill every field");
//            return false;
//            
//        }      
//        else{
        swal("Successfully Transaction is Added")
        var form = $('#clienttrasactions');
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                console.log(data);
                $('#subloader').empty();
                $('#subloader').load('/IOC/clients/client_transactions').hide().fadeIn('slow');
            }
        });
            });
            
            
        $.getJSON('clients/getclientdata', function (data) {
            
            var len = data.length;

            for (x = 0; x < len; x++) {
                $('#cliName').append(
                        $('<option class="cliName" id="' + x + '"></option>').val(x).html(data[x].client_fname+" "+data[x].client_lname));

            }
            
            
        });

    function loadnum() {


        var ee = document.getElementById("cliName").value;
        $.getJSON('clients/getclientdata', function (data) {

            document.getElementById("client_id").value = data[ee].client_id;
           document.getElementById("client_name").value= data[ee].client_fname+" "+data[ee].client_lname;
        
        });
    }



            
            
</script>

