@extends('layouts.dashboard.app_master')
@section('page_title')
Contacts Trash
@endsection

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Contacts Trash : {{ count($contacts) }}</h3>
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
                          <td>{{ $contacts->FirstItem()+$loop->index}}</td>
                           <td>{{ $contact->title_message }}</td>
                           <td>{{ $contact->message }}</td>
                           <td><a href="{{ route('contacts.restore', ['id'=>$contact->id]) }}" class="btn btn-sm btn-success">Restore</a></td>

                           <td>

      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{ $contact->id }}"> Delete</button>

                        <!-- model -->
   <div class="modal fade" id="modal-default{{ $contact->id }}">
    <!-- start form -->
    <form action="{{ route('contacts.delete', ['id'=>$contact->id]) }}" method="post">
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
                        <h1 class="text-capitalize">Sorry No Contacts Trashed</h1>
                    </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                {{-- <div>{{ $categories->links() }}</div> --}}
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection

