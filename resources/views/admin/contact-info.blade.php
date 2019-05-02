@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
  
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">
              Contact Info
      </li>
    </ol>
    <!-- Example DataTables Card-->
    
    <div class="container-fluid">
     

            <form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" id="id" value="{{$contact_info->id}}" >
                <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-phone "></i>                 
                            Add contact informations
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control lat" value="{{$contact_info->latitude}}" placeholder="Latitude" name="latitude" id="latitude" required>
                        <p class="pull-right" id="lat" style="font-size: 12px">15 characters remaining</p>

                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control long" value="{{$contact_info->longitude}}" placeholder="Longitude" name="longitude" id="longitude" required>
                        <p class="pull-right" id="long" style="font-size: 12px">15 characters remaining</p>

                    </div>
                    <div class="form-group">
                        <label>Google Maps API Key</label>
                        <input type="text" class="form-control api" value="{{$contact_info->api_key}}" placeholder="API Key" name="api_key" id="api_key">
                        <p class="pull-right" id="api" style="font-size: 12px">100 characters remaining</p>

                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control phon" value="{{$contact_info->phone}}" placeholder="Phone Number" name="phone" id="phone" required>
                        <p class="pull-right" id="phon" style="font-size: 12px">100 characters remaining</p>
                    </div>
                    <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control addr" value="{{$contact_info->address}}" placeholder="Address" name="address" id="address" required>
                            <p class="pull-right" id="addr" style="font-size: 12px">100 characters remaining</p>

                        </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control emai" value="{{$contact_info->email}}" placeholder="Email" name="email" id="email" required>
                        <p class="pull-right" id="emai" style="font-size: 12px">150 characters remaining</p>

                    </div>
                    <div class="form-group">
                        <label>Facebook link</label>
                        <input type="text" class="form-control face" value="{{$contact_info->facebook}}" placeholder="Facebook link" name="facebook" id="facebook">
                        <p class="pull-right" id="face" style="font-size: 12px">150 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="text" class="form-control twit" value="{{$contact_info->twitter}}" placeholder="Twitter link" name="twitter" id="twitter">
                        <p class="pull-right" id="twit" style="font-size: 12px">150 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Google Plus Link</label>
                        <input type="text" class="form-control goop" value="{{$contact_info->google_plus}}" placeholder="Google Plus Link" name="google_plus" id="google_plus">
                        <p class="pull-right" id="goop" style="font-size: 12px">150 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Linkedin Link</label>
                        <input type="text" class="form-control linked" value="{{$contact_info->linkedin}}" placeholder="Linkedin Link" name="linkedin" id="linkedin">
                        <p class="pull-right" id="linked" style="font-size: 12px">150 characters remaining</p>
                    </div>
                    <div class="form-group">
                        <label>Instagram Link</label>
                        <input type="text" class="form-control insta" value="{{$contact_info->instagram}}" placeholder="Instagram Link" name="instagram" id="instagram">
                        <p class="pull-right" id="insta" style="font-size: 12px">150 characters remaining</p>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary pull-left">
                            Submit
                    </button>
                </div>
                </div>
            </form>
  </div>
</div>
@endsection









