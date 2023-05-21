@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Comments</h1>
    </div>

    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>id</th>
                <th>User</th>
                <th>Blog Title</th>
                <th>Rate</th>
                <th>IP</th>
                <th>Subject</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Show</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $rs)
            <tr>
                <td>{{$rs -> id}}</td>
                <td>{{$rs -> user ->name}}</td>
                <td><a href="/admin/blog/show/{{$rs->blog->id}}"> {{$rs ->blog->title}} </a></td>
                <td>{{$rs -> rate}}</td>
                <td>{{$rs -> ip}}</td>
                <td>{{$rs -> subject}}</td>
                <td>{{$rs -> comment}}</td>
                <td>{{$rs -> status}}</td>
                <td>
                    <a href="{{route("comment.destroy",['id'=>$rs->id])}}" class="btn btn-danger btn-icon-split">
                        <span class="text">Delete</span>
                    </a>
                </td>
                <td>
                    <a href="{{route("comment.show",['id'=>$rs->id])}}" class="btn btn-primary btn-icon-split" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')">
                        <span class="text">Show</span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
@include("admin.admin_footer");
