@extends('admin.layouts.master')
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip(); 
        $('#tblData').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, "desc" ]],
            ajax: '{{ url("/admin/service/list") }}',
            dom: 'lBfrtip',
            buttons : ["copy","excel","csv","pdf","print"],
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'title', name: 'title'},
            { data: 'service_category_id', name : 'service_category_id'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $.fn.dataTable.ext.errMode = 'alert';

        deleteService=function(id){
            if(confirm('Apa Anda yakin akan menghapus service ini?')){      
                $.ajax({
                    type: "GET",
                    url:'/admin/service/delete/'+id,
                    dataType: 'json',      
                    success: function(data) {
                        alert(data);
                        location.reload();
                    },
                    completed :function(data){              
                    }
                });
            }
        };
    });

//});

</script>
@endsection
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Services <small>pengaturan service</small></h2>
            <div class="clearfix"></div>
            <a href="/admin/service/edit/new" class="btn btn-primary">+ Add New</a>
        </div>
        <div class="x_content">
            <table id="tblData" class="table table-striped table-bordered">
                <thead>
                    <tr class="headings">
                        <th class="column-title">No </th>
                        <th class="column-title">Title </th>
                        <th class="column-title">Category </th>
                        <th class="column-title">Created At </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
