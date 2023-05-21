@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blogs</h1>
    </div>

    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Contents</th>
                <th>Keywords</th>
                <th>Descr</th>
                <th>Detail</th>
                <th>Image</th>
                <th>Image Gallery</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Show</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $rs)
            <tr>
                <td>{{$rs -> id}}</td>
                <td>{{$rs -> title}}</td>
                <td>{{\App\Http\Controllers\CategoryController::getParentsTree($rs->category,$rs->category->title)}}</td>
                <td>{!!$rs -> contents!!}</td>
                <td>{{$rs -> keywords}}</td>
                <td>{{$rs -> description}}</td>
                <td>{{$rs -> detail}}</td>
                <td><img src="{{Storage::url($rs->image)}}" width="100px"></td>
                <td>
                    <a href="{{route("image.index",['pid'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')">
                        <i class="fa-solid fa-images" style="font-size: x-large"></i>
                    </a>
                </td>
                <td>{{$rs -> status}}</td>
                <td>
                    <a href="{{route("blog.edit",['id'=>$rs->id])}}" class="btn btn-info btn-icon-split">
                    <span class="text">Edit</span>
                    </a>
                </td>
                <td>
                    <a href="{{route("blog.destroy",['id'=>$rs->id])}}" class="btn btn-danger btn-icon-split">
                        <span class="text">Delete</span>
                    </a>
                </td>
                <td>
                    <a href="{{route("blog.show",['id'=>$rs->id])}}" class="btn btn-primary btn-icon-split">
                        <span class="text">Show</span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-3">
        <a href="/admin/blog/create"><button class="btn btn-primary" type="submit">Add Blog</button></a>
    </div>
</div>
<!-- /.container-fluid -->

</div>
@include("admin.admin_footer");
