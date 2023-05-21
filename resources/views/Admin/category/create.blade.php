@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="container">
        <form role="form" action="/admin/category/add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Parent Category</label>
                <select class="form-control form-select" name="parent_id" >
                    <option value="0" selected > Main Category</option>
                    @foreach($data as $rs)
                        <option value="{{$rs->id}}">{{\App\Http\Controllers\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Keywords</label>
                <input type="text" name="keywords" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="descr" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile01">
            </div>
            <select class="form-select mb-3" name="statu" aria-label="Default select example">
                <option selected value="true">True</option>
                <option value="false">False</option>
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
@include("admin.admin_footer");
