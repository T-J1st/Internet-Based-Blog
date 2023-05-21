@include("admin.admin_header");
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Settings</h1>
    </div>

    <div class="container">
        <form role="form" action="{{route("settingUpdate")}}" method="post">
            @csrf
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
                <label for="exampleInputPassword1" class="form-label">Company</label>
                <input type="text" name="company" class="form-control" id="exampleInputPassword1"  value="{{$data->company}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="exampleInputPassword1"  value="{{$data->address}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1"  value="{{$data->phone}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fax</label>
                <input type="text" name="fax" class="form-control" id="exampleInputPassword1"  value="{{$data->fax}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputPassword1"  value="{{$data->email}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">smtp server</label>
                <input type="text" name="smtpserver" class="form-control" id="exampleInputPassword1"  value="{{$data->smtpserver}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">smtp email</label>
                <input type="text" name="smtpemail" class="form-control" id="exampleInputPassword1"  value="{{$data->smtpemail}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">smtp password</label>
                <input type="text" name="smtppassword" class="form-control" id="exampleInputPassword1"  value="{{$data->smtppassword}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">smtp port</label>
                <input type="text" name="smtpport" class="form-control" id="exampleInputPassword1"  value="{{$data->smtpport}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control" id="exampleInputPassword1"  value="{{$data->facebook}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" id="exampleInputPassword1"  value="{{$data->instagram}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Twitter</label>
                <input type="text" name="twitter" class="form-control" id="exampleInputPassword1"  value="{{$data->twitter}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Youtube</label>
                <input type="text" name="youtube" class="form-control" id="exampleInputPassword1"  value="{{$data->youtube}}">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Image</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile01">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">About Us</label>
                <textarea name="aboutus" id="myeditor" rows="10" cols="80">{{$data->aboutus}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contact</label>
                <textarea name="contact" id="myeditor1" rows="10" cols="80" >{{$data->contact}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Referances</label>
                <input type="text" name="references" class="form-control" id="exampleInputPassword1" value="{{$data->references}}">
            </div>
            <label for="exampleInputPassword1" class="form-label">Statu</label>
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
