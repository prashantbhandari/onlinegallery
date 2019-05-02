@extends("admin.common.index")
@section("body")

<div class="content-wrapper">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/admin/home">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Admins Management</li>
    </ol>
    <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-user"></i> Admins Management
        <a class="btn-sm btn-success pull-right" href="/register">Add Admin</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Option</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>                    
                <th>Option</th>                    
              </tr>
            </tfoot>
            <tbody>
              @foreach(App\User::all() as $user)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}
                    @if($user->email ==  Auth::user()->email)
                      <span class="badge btn-warning">you</span>
                    @else
                    @endif
                  </td>
                  <td>{{$user->created_at}}</td>
                  <td>
                    @if($count<=1)
                    @else
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="delete_category({{ $user->id }})">Delete</button>
                    @endif                       
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->

<div class="modal fade" id="deleteModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Admin</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete the admin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="delete_confirm()">Delete</button>                
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  {{-- Delete --}}

  <script>
      
    function delete_category(id){
      deleteId = id;
    }
  
    function delete_confirm(){
      window.location.href = "/admin/admins/"+deleteId+"/delete";
    }

  </script>
  

@endsection


