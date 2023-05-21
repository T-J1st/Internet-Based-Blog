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

    <title>@yield("title")</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Show User</h1>
    </div>

    <div class="container">
        <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
            <tbody>
            <tr>
                <td>id</td>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{$data->name}}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>{{$data->email}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>@foreach($data->roles as $roles)
                        {{$roles -> name}}
                        <a href="{{route("user.destroyrole",['uid'=>$data->id,'rid'=>$roles->id])}}" class="btn btn-danger btn-icon-split">
                            <span class="text">X</span>
                        </a>,
                    @endforeach</td>
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
            <tr>
                <td>Admin Note</td>

                <td>
                    <form role="form" action="/admin/user/addrole/{{$data->id}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control form-control-lg light-300" name="role_id">
                                @foreach($role as $r)
                                <option value="{{$r -> id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>


<script type="text/javascript" src="/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    document.addEventListener( 'DOMContentLoaded',function()
    {
        CKEDITOR.replace( 'myeditor' );
    });
</script>
<script type="text/javascript">
    document.addEventListener( 'DOMContentLoaded',function()
    {
        CKEDITOR.replace( 'myeditor1' );
    });
</script>

</body>

</html>
