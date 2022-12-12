@extends('layouts.dashboard.app_master')
@section('page_title')
Users Trash
@endsection

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Users Trash : {{ count($users) }}</h3>
            </div><!-- card-header -->


     <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success text-center">
                <h3>{{ session('success') }}</h3>
            </div>
        @endif

                @if (count($users)>0)

                    <table class="table table-responsive-lg text-center">
                     <thead>
                       <tr>
                        <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Email Verified At</th>
                         <th>Password</th>

                         <th>Current Team Id</th>
                         <th>Profile Photo Path</th>

                         <th>Restore</th>
                         <th>Delete</th>
                       </tr>
                     </thead>
                     <tbody>

                        {{-- @php($index=1) --}}
                   @foreach ($users as $user)

                       <tr>
                           <td>{{ $users->FirstItem()+$loop->index}}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                           <td>{{ $user->email_verified_at }}</td>
                           <td>{{ $user->password }}</td>

                           <td>{{ $user->current_team_id }}</td>
                           <td>{{ $user->profile_photo_path }}</td>

                           <td><a href="{{ route('users.restore', ['id'=>$user->id]) }}" class="btn btn-sm btn-success">Restore</a></td>

                           <td>

      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{ $user->id }}"> Delete</button>

                        <!-- model -->
   <div class="modal fade" id="modal-default{{ $user->id }}">
    <!-- start form -->
    <form action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal-dialog">

          <div class="modal-content">

            <div class="modal-header bg-danger text-white">
              <h4 class="modal-title"><h4>Delete Confirmation</h4></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div><!-- modal-header -->

            <div class="modal-body text-danger">
              <p>Are You Sure You Want TO Delete This User ! <br>
                It Will Be Deleted Permenantly &hellip;</p>
            </div><!-- modal-body -->

            <div class="modal-footer justify-content-between bg-danger">
              <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default">Delete</button>
            </div><!-- modal-footer -->
          </div><!-- /.modal-content -->

        </div> <!-- /.modal-dialog -->

    </form> <!-- end form -->
      </div><!-- /.modal -->


                     </td>

                       </tr>
                   @endforeach

                     </tbody>
                   </table>
                @else
                   <div class="alert alert-dark text-center ">
                        <h1 class="text-capitalize">Sorry No Users Trashed</h1>
                    </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                <div>{{ $users->links() }}</div>
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection

