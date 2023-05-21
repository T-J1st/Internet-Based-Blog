@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Messages</h1>
    </div>

    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>IP</th>
                <th>Subject</th>
                <th>message</th>
                <th>Status</th>
                <th>Delete</th>
                <th>Show</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $rs)
            <tr>
                <td>{{$rs -> id}}</td>
                <td>{{$rs -> name}}</td>
                <td>{{$rs -> email}}</td>
                <td>{{$rs -> phone}}</td>
                <td>{{$rs -> ip}}</td>
                <td>{{$rs -> subject}}</td>
                <td>{!!$rs -> message!!}</td>
                <td>{{$rs -> status}}</td>
                <td>
                    <a href="{{route("message.destroy",['id'=>$rs->id])}}" class="btn btn-danger btn-icon-split">
                        <span class="text">Delete</span>
                    </a>
                </td>
                <td>
                    <a href="{{route("message.show",['id'=>$rs->id])}}" class="btn btn-primary btn-icon-split" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')">
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
