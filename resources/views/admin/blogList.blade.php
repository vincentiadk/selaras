@extends('admin.layouts.master')
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip(); 
        $('#tblData').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, "desc" ]],
            ajax: '{{ url("/admin/blog/list") }}',
            dom: 'lBfrtip',
            buttons : ["copy","excel","csv","pdf","print"],
            columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'title', name: 'title'},
            { data: 'blog_category_id', name: 'blog_category_id' },
            { data: 'abstract', name: 'abstract' },
            { data: 'tags', name: 'tags' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        $.fn.dataTable.ext.errMode = 'alert';

        deleteBlog=function(id){
            if(confirm('Apa Anda yakin akan menghapus blog post ini?')){      
                $.ajax({
                    type: "GET",
                    url:'/admin/blog/delete/'+id,
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
            <h2>Blog <small>semua blog post</small> <button class="btn btn-primary" onclick="window.open('/admin/blog/edit/new')"><i class="fa fa-plus"></i> Add</button></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="tblData" class="table table-striped table-bordered">
                <thead>
                    <tr class="headings">
                        <th class="column-title">No </th>
                        <th class="column-title">Judul </th>
                        <th class="column-title">Kategori </th>
                        <th class="column-title">Abstract </th>
                        <th class="column-title">Tags </th>
                        <th class="column-title">Created</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
