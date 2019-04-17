<script>
    var htmlTable =$('.htmlDataTable').DataTable({

        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        },
        "bPaginate": true,
        "sDom": 'fptip',
        "pageLength": 20,
        "order": [],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            "lengthMenu": '<select class="form-control hidden">'+
            '<option value="10">10</option>'+
            '<option value="20">20</option>'+
            '<option value="30">30</option>'+
            '<option value="40">40</option>'+
            '<option value="50">50</option>'+
            '<option value="-1">100</option>'+
            '</select>'
        }

    });
    </script>
<script>
    var currentRow = '';
    var ajaxTable='';
    var rowId ='';
    var operationStatus ='' //edit/delete/create
    function loadDataTable(url,column) {

        ajaxTable = $('.ajaxDataTable').DataTable({
            //processing: true,
            serverSide: true,
            "bPaginate": true,
            "sDom": 'fptip',
            "pageLength": 20,
            ajax: url,
            columns: column,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            rowId: 'id',
            "order":[],
            lengthChange: false,
            autoWidth: false,
            "drawCallback": function () {
                if(operationStatus=='create'){
                    var newRowId = $("#"+rowId);
                    newRowId.css('background-color','#d6d6d6');
                    setTimeout(function(){
                        newRowId.css('background-color','#fff');
                    }, 3000);
                    operationStatus=''; //set empty
                }


                $(".ajaxDatatableEdit").click(function () {
                    var id = $(this).parents('tr').attr('id');
                    currentRow = $('#' + id);
                });
            },
        });
    }

    function loadDataTableTwo(url,column) {

        ajaxTable = $('.ajaxDataTableTwo').DataTable({
            //processing: true,
            serverSide: true,
            "bPaginate": true,
            "sDom": 'fptip',
            "pageLength": 20,
            ajax: url,
            columns: column,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            rowId: 'id',
            "order":[],
            lengthChange: false,
            autoWidth: false,
            "drawCallback": function () {
                if(operationStatus=='create'){
                    var newRowId = $("#"+rowId);
                    newRowId.css('background-color','#d6d6d6');
                    setTimeout(function(){
                        newRowId.css('background-color','#fff');
                    }, 3000);
                    operationStatus=''; //set empty
                }


                $(".ajaxDatatableEdit").click(function () {
                    var id = $(this).parents('tr').attr('id');
                    currentRow = $('#' + id);
                });
            },
        });
    }

    function loadDataTableCustom(url,column,className) {

        ajaxTable = $(className).DataTable({
            //processing: true,
            serverSide: true,
            "bPaginate": true,
            "sDom": 'fptip',
            "pageLength": 20,
            ajax: url,
            columns: column,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            rowId: 'id',
            "order":[],
            lengthChange: false,
            autoWidth: false,
            "drawCallback": function () {
                if(operationStatus=='create'){
                    var newRowId = $("#"+rowId);
                    newRowId.css('background-color','#d6d6d6');
                    setTimeout(function(){
                        newRowId.css('background-color','#fff');
                    }, 3000);
                    operationStatus=''; //set empty
                }


                $(".ajaxDatatableEdit").click(function () {
                    var id = $(this).parents('tr').attr('id');
                    currentRow = $('#' + id);
                });
            },
        });
    }
</script>

<script>
    //ajax delete RESTFUL from Datatable
    function ajaxDelete(obj){
            var self=$(obj);
            //e.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ec407a',
                cancelButtonColor: '#fff',
                confirmButtonText: 'DELETE'
            }).then(function () {
                $.ajax({
                    url: self.attr('data-url'),
                    data:{'_token':'{{csrf_token()}}','_method':'DELETE'},
                    method: 'POST',
                    success: function(data) {
                        if(data.status=='success'){
                            $('#msgSuccess').text(data.message);
                            $('.successAlert').show().delay(1000).fadeOut(3000);
                            /* Hide the Row */
                            self.parents('tr').css('background-color','#d5d5d5');
                            self.parents('tr').hide(1000,function () {
                                ajaxTable.row( self.parents('tr') ).remove().draw(false);//draw false means page will not reset
                            });


                        }else if(data.status=='error'){
                            $('#msgError').text(data.message);
                            $('.warningAlert').show().delay(1000).fadeOut(3000);
                        }

                    },
                    error: function(data) {
                        swal("Error!", "Something wrong", "warning")
                    }
                });
            }).catch(swal.noop)
        }
</script>
<script>
    function ajaxPostForm(form) {
            $.ajax({
                'url': form.attr('action'),
                'method': 'POST',
                'data': form.serialize(),
                success: function (data) {
                    getReturnData(data);
                },
                error: function () {
                    swal("Something wrong. Please try again!");
                }
            });
    }


    function loadDataTableCart(url,column) {

        ajaxTable = $('.ajaxDataTable').DataTable({
            //processing: true,
            serverSide: true,
            "bPaginate": true,
            "sDom": 'fptip',
            "pageLength": 20,
            ajax: url,
            columns: column,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            },
            rowId: 'id',
            "order":[],
            lengthChange: false,
            autoWidth: false,
            "drawCallback": function () {
                if(operationStatus=='create'){
                    var newRowId = $("#"+rowId);
                    newRowId.css('background-color','#d6d6d6');
                    setTimeout(function(){
                        newRowId.css('background-color','#fff');
                    }, 3000);
                    operationStatus=''; //set empty
                }
  

                $(".ajaxDatatableEdit").click(function () {
                    var id = $(this).parents('tr').attr('id');
                    currentRow = $('#' + id);
                });
            },
        });

        
    }

</script>