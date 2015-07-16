<form class="form-horizontal">
    <fieldset>
        <legend>Search lubricants</legend>
        <div class="form-group">
            <div class="col-lg-5">
                <input type="text" class="form-control" id="search_lb" placeholder="filter">
            </div>
        </div>
    </fieldset>
</form>

<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Supplier</th>
        </tr>
    </thead>
    <tbody>
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
                <form class="form-horizontal" id="edit_lube_form" action="stocks/addLube" method="post">
    <fieldset>
    
        <div class="form-group">
        <label for="prd-name" class="col-lg-2 control-label">Product name</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" id="prd-name" placeholder="product name" name="prd-name">
        </div>
        </div>
        <div class="form-group">
        <label for="price" class="col-lg-2 control-label">Price</label>
        <div class="col-lg-7">
            <input type="text" class="form-control" id="price" placeholder="price" name="prd-price">
        </div>
        </div>
        <div class="form-group">
        <label for="qnty" class="col-lg-2 control-label">Quantity</label>
        <div class="col-lg-7">
            <input type="number" class="form-control" id="qnty" placeholder="quantity" name="prd-qnty">
        </div>
        </div>
        <div class="form-group">
        <label for="supplier" class="col-lg-2 control-label">Supplier</label>
        <div class="col-lg-4">
                <select id="supplier" placeholder="supplier" class="form-control" name="supplier">
                  <option></option>
                  <option value="IOC">IOC</option>
                  <option value="T2 dude">T2 dude</option>
                  <option value="Le Dude">Le Dude</option>
                </select>
        </div>
        </div>
        <div class="form-group">
            
            
            
        </div>  
    </fieldset>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $.getJSON('stocks/loadLubricants',function(data){
            console.log(data[0].Id);

            var len = data.length;
            for(x=0;x<len;x++){
                $("tbody").append('<tr class="' + x +'">');
                $("." + x + "").append('<td>' + data[x].Name + '</td>');
                $("." + x + "").append('<td>' + data[x].Price + '</td>');
                $("." + x + "").append('<td>' + data[x].Quantity + '</td>');
                $("." + x + "").append('<td>' + data[x].Supplier + '</td>');
                $("." + x + "").append('<td><div class="icon-preview"><a href="' + data[x].Id + '" class="edit"><i class="mdi-content-create"></i></a></div></td>');
                $("." + x + "").append('<td><div class="icon-preview"><a href="' + data[x].Id + '" class="remove"><i class="mdi-content-remove-circle"></i></a></div></td>');
                $("." + x + "").append('</tr>');
            }
            
            $('.remove').click(function(e){
                var id = $(this).attr('href');
                $.post('stocks/removeLubricant', { ID : id }, function(data){
                    console.log(data);
                    alert('Done !');
                    $('#subloader2').empty();
                    $('#subloader2').load('/IOC/stocks/edit_lube',function(){
                        $('#subloader2').hide();
                        $('#subloader2').fadeIn('slow');
                    });
                });
                return false;
            });
            $('.edit').click(function(e){
                var id = $(this).attr('href');
                $.getJSON('stocks/loadLubricantEditData',function(data1){
                    console.log(data1);
                });
                $('#myModal').modal('show');
                setTimeout(function(){
                    $('#prd-name').val('Test');
                    
                },250);
                e.preventDefault();
            });
        });
    });

</script>