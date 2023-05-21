@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
    </div>

    <div class="container">
        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <tbody>
            <tr>
                <td>id</td>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{$data->title}}</td>
            </tr>
            <tr>
                <td>Keeywords</td>
                <td>{{$data->keywords}}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td> <img src="{{\Illuminate\Support\Facades\Storage::url($data->image)}}"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$data->status}}</td>
            </tr>
            <tr>
                <td>Created Date</td>
                <td>{{$data->created_at}}</td>
            </tr>
            <tr>
                <td>Update Date</td>
                <td>{{$data->updated_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
@include("admin.admin_footer");
