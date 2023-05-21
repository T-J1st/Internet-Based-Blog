@include("user.header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Comments</h1>
    </div>

    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>id</th>
                <th>Blog Title</th>
                <th>Rate</th>
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
                <td><a href="/blogsingle/{{$rs->blog->id}}"> {{$rs ->blog->title}} </a></td>
                <td>{{$rs -> rate}}</td>
                <td>{{$rs -> subject}}</td>
                <td>{{$rs -> comment}}</td>
                <td>{{$rs -> status}}</td>
                <td>
                    <a href="/userx/destroy/{{ $rs->id }}" class="btn btn-danger btn-icon-split">
                        <span class="text">Delete</span>
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
@include("user.footer");
