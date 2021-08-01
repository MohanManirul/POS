
<!--- date range picker ---->
<script type="text/javascript">
    $(function(){
        $('.singledatepicker').daterangepicker({
            singleDatePicker:true,
            showDropdown:true,
            autoUpdateInput:false,
            autoApply:true,
            locate: {
                format:'DD-MM-YYYY',
                daysOfWeek:['Sa' , 'Su' , 'Mo' , 'Tu' , 'We' , 'Th' , 'Fr'],
                firstDay:0
            },
            minDay: '01/01/1930',
        },
        function(start){
            this.element.val(start.format('DD-MM-YYYY'));
            this.element.parent().removeClass('has-error');

        },
        function(choose_date){
            this.element.val(choose_date.format('DD-MM-YYYY'));
        });
        $('.singledatepicker').on('apply.daterangepicker', function(ev,picker){
            $(this).val(picker.startDate.format('DD-MM-YYYY'));
            $(this).trigger('change');
        });
    });
        
</script>
<!--- date range picker ---->

<!--- image ---->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            render.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!--- image ---->.

<!----Employee form validation ---->
<script type="text/javascript">
    $(document).ready(function(){
        $('#addSuppliers').validate({
            rules:{
                "name":{
                    required:true,
                },
                "mobile_no":{
                    required:true,
                }, 
                "address":{
                    required:true,
                }, 
                "email":{
                    required:true,
                },
                
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Employee form validation ---->


<!----Units form validation ---->
<script type="text/javascript">
    $(document).ready(function(){
        $('#addUnits').validate({
            rules:{
                "name":{
                    required:true,
                },
                
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Units form validation ---->


<!----Category form validation ---->
<script type="text/javascript">
    $(document).ready(function(){
        $('#addCategory').validate({
            rules:{
                "name":{
                    required:true,
                },
                
            },
            messages:{

            },
            errorElement:'span',
            errorPlacement: function(error,element){
                error.addClass('Invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight:function(element , errorclass,validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight:function(element , errorclass,validClass){
                $(element).removeClass('is-invalid');
            }

           
        });
    });
</script>
<!----Category form validation ---->


<!-- Category selection for Supplier -->
    <script>
        $(function(){
            $(document).on('change','#supplier_id', function(){
                var supplier_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-category')}}",
                    type:"GET",
                    data:{supplier_id : supplier_id},
                    success:function(data){
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function(key,v){
                            html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
                        });
                        $('#category_id').html(html);
                        
                    }
                });
            });
        });
    </script>
<!-- Category selection for Supplier -->


<!-- Product selection for Category -->
    <script>
        $(function(){
            $(document).on('change','#category_id', function(){
                var category_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-product')}}",
                    type:"GET",
                    data:{category_id : category_id},
                    success:function(data){
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key,v){
                            html +='<option value="'+v.id+'">'+v.name+'</option>'; // here no join needed beacuse same table
                        });
                        $('#product_id').html(html);
                        
                    }
                });
            });
        });
    </script>
<!-- Product selection for Category -->

<!-- purchase list html before send to database  -->
        <script id="document-template" type="text/x-handlebars-template">
            <tr class="delete_add_more_item" id="delete_add_more_item">
                <input type="hidden" name="date[]" value="@{{date}}">
                <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
                <input type="hidden" name="supplier_id[]" value="@{{supplier_id}} ">
                
                <td>
                    1
                </td>
                <td>
                    <input type="hidden" name="category_id[]" value="@{{category_id}}">
                    @{{category_name}}
                </td>
                <td>
                    <input type="hidden" name="product_id[]" value="@{{product_id}}">
                    @{{product_name}}
                </td>
                <td>
                    <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
                </td>
                <td>
                    <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
                </td>
                
                <td>
                    <input type="text" name="description[]" class="form-control form-control-sm">
                </td>
                <td>
                    <input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
                </td>
                <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
            </tr>
        </script>
<!-- purchase list html before send to database  -->

<!-- addeventmore button click--->
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click" , ".addeventmore" , function(){
            
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            if(date == ""){
                $.notify("Date is required" , {globalPosition: 'top right',className: 'error'});
                return false;
            }

            if(purchase_no == ""){
                $.notify("purchase no is required" , {globalPosition: 'top right',className: 'error'});
                return false;
            }

            if(supplier_id == ""){
                $.notify("supplier id is required" , {globalPosition: 'top right',className: 'error'});
                return false;
            }

            if(category_id == ""){
                $.notify("category id is required" , {globalPosition: 'top right',className: 'error'});
                return false;
            }

            if(product_id == ""){
                $.notify("product id name is required" , {globalPosition: 'top right',className: 'error'});
                return false;
            }

            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date : date,
                purchase_no : purchase_no,
                supplier_id : supplier_id,
                category_id : category_id,
                category_name : category_name,
                product_id : product_id,
                product_name : product_name
            };

            var html = template(data);
            $('#addRow').append(html);

        });

        // remove product and calculate total taka
        $(document).on("click",".removeeventmore" , function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        // calculate total amount when kyeup , change or insert unit price ,buying qty 
        $(document).on('keyup click' , '.unit_price , .buying_qty' , function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });
    
        
        // calculate sum of amount 

        function totalAmountPrice(){
            var sum = 0;
            $('.buying_price').each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length !=0){
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }
    });
</script>


<!-- Approve purchase -->

<script type="text/javascript">
        $(function(){
            $(document).on('click' , '#approveBtn',function(e){
                e.preventDefault();
                var link = $(this).attr("href");
                Swal.fire({
                    title: 'Are you sure ?',
                    text :"Approve this data",
                    icon:'warning',
                    showCancelButton:true,
                    confirmButtonColor:'#3085d6',
                    cancelButtonColor:'#d33',
                    confirmButtonText:'Yes, Approve it'

                }).then((result)=>{
                    if(result.value){
                        window.location.href = link;
                        Swal.fire(
                            'Deleted',
                            'Your file has been deleted',
                            'success'
                        )
                    }
                })
            });
        });

    </script>
<!-- Approve purchase -->

<!-- Invoice part --  getting product for Category selection -->
<script>
        $(function(){
            $(document).on('change','#category_id', function(){
                var category_id = $(this).val();
                $.ajax({
                    url:"{{ route('get-product')}}",
                    type:"GET",
                    data:{category_id : category_id}, // category_id will be send to get-product route's controller 
                    success:function(data){
                        // from controller data will be show here
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key,v){
                            html +='<option value="'+v.id+'">'+v.product.quantity+'</option>';
                        });
                        $('#category_id').html(html);                        
                    }
                });
            });
        });
    </script>
<!-- Invoice part --  getting product for Category selection -->


<!-- Invoice part --  getting stock for Category selection -->
<script>
        $(function(){
            $(document).on('change','#product_id', function(){
                var product_id = $(this).val();
                $.ajax({
                    url:"{{ route('check-product-stock')}}",
                    type:"GET",
                    data:{product_id : product_id}, //product_id send to controller
                    success:function(data){
                        // where to show on page
                        $('#current_stock_quantity').val(data);                      
                    }
                });
            });
        });
    </script>
<!-- Invoice part --  getting stock for Category selection -->
