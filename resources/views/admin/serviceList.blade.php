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
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $.fn.dataTable.ext.errMode = 'alert';

        deleteArtikel=function(id){
            if(confirm('Apa Anda yakin akan menghapus halaman ini?')){      
                $.ajax({
                    type: "GET",
                    url:'/admin/page/delete/'+id,
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
            <h2>Halaman <small>pengaturan halaman</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="tblData" class="table table-striped table-bordered">
                <thead>
                    <tr class="headings">
                        <th class="column-title">No </th>
                        <th class="column-title">Title </th>
                        <th class="column-title">Slug </th>
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
