@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
    </div>

    <div class="container">
        <form role="form" action="{{route("blog.update",['id'=>$data->id])}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Parent Category</label>
                <select class="form-control form-select" name="category_id" >
                    @foreach($datacate as $rs)
                        <option value="{{$rs->id}}">{{\App\Http\Controllers\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$data->title}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Keywords</label>
                <input type="text" name="keywords" class="form-control" id="exampleInputPassword1" value="{{$data->keywords}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="descr" class="form-control" id="exampleInputPassword1" value="{{$data->description}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Content</label>
                <input type="text" name="contents" class="form-control" id="exampleInputPassword1"  value="{{$data->contents}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Detail</label>
                <input type="text" name="detail" class="form-control" id="exampleInputPassword1" value="{{$data->detail}}">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile01">
            </div>
            <select class="form-select mb-3" name="statu" aria-label="Default select example">
                <option selected value="{{$data->status}}">{{$data->status}}</option>
                <option value="true">True</option>
                <option value="false">False</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
@include("admin.admin_footer");
