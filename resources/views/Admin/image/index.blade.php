<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://kit.fontawesome.com/76767a61ed.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blog Image List</h1>
    </div>

    <form role="form" action="{{route('image.store',['pid'=>$blog->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Image</label>
            <input type="file" name="image" class="form-control" id="inputGroupFile01">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="container mt-3">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $rs)
            <tr>
                <td>{{$rs -> id}}</td>
                <td>{{$rs -> title}}</td>
                <td><img src="{{Storage::url($rs->image)}}" width="250px"></td>
                <td>
                    <a href="{{route("image.destroy",['pid'=>$blog->id,'id'=>$rs->id])}}" class="btn btn-danger btn-icon-split">
                        <span class="text">Delete</span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</html>
