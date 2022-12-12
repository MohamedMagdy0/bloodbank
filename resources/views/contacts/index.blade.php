@extends('layouts.dashboard.app_master')
@section('page_title')
Contacts
@endsection

@section('content')



    <!-- searsh -->
    <div class="container mb-l">
        <div class="mb-1 w-25">
            <form action="" method="get">
                <div class="input-group">
                    <input type="search" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Search By Title !">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-md btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div><!-- button -->
                </div><!-- input-group -->
            </form>
        </div>
    </div><!-- container -->
    <!-- end searsh -->



    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>All Contacts : {{ count($contacts) }}</h3>
            </div><!-- card-header -->


     <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success text-center">
                <h3>{{ session('success') }}</h3>
            </div>
        @endif

                @if (count($contacts)>0)

                    <table class="table table-responsive-lg text-center">
                     <thead>
                       <tr>
                         <th>ID</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Phone</th>
                         <th>Title Message</th>
                         <th>Message</th>
                         <th>Edit</th>
                         <th>Delete</th>
                       </tr>
                     </thead>
                     <tbody>

                        {{-- @php($index=1) --}}
                   @foreach ($contacts as $contact)

                       <tr>
                           <td>{{ $contact->id}}</td>
                           <td>{{ $contact->client->name}}</td>
                           <td>{{ $contact->client->email}}</td>
                           <td>{{ $contact->client->phone}}</td>
                           <td>{{ $contact->title_message }}</td>
                           <td>{{ $contact->message }}</td>
                           <td><a href="{{ route('contacts.edit', ['id'=>$contact->id]) }}" class="btn btn-sm btn-success">Edit</a></td>

                           <td>

      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{ $contact->id }}"> Delete</button>

                        <!-- model -->
   <div class="modal fade" id="modal-default{{ $contact->id }}">
    <!-- start form -->
    <form action="{{ route('contacts.softDelete', ['id'=>$contact->id]) }}" method="post">
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
              <p>Are You Sure You Want TO Delete This Contact : <span class="text-primary">{{ $contact->name }}</span> <br>
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
                        <h1 class="text-capitalize">Sorry No ContactS</h1>
                        {{-- <a class="linked text-primary" href="{{ route('contacts.create') }}">If You Want To Create Please Click Here</a> --}}
                   </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                {{-- <div>{{ $contacts->links() }}</div> --}}
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection

