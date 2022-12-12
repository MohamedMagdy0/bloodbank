@extends('layouts.dashboard.app_master')
@section('page_title')
Categories Trash
@endsection

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Categories Trash : {{ count($categories) }}</h3>
            </div><!-- card-header -->


     <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success text-center">
                <h3>{{ session('success') }}</h3>
            </div>
        @endif

                @if (count($categories)>0)

                    <table class="table table-responsive-lg text-center">
                     <thead>
                       <tr>
                         <th>ID</th>
                         <th>About App Text</th>
                         <th>Contact Phone</th>
                         <th>Contact Email</th>
                         <th>Notification Setting Text</th>

                         <th>Facebook Link</th>
                         <th>Instagram Link</th>
                         <th>Twitter Link</th>
                         <th>Youtube Link</th>

                         <th>Restore</th>
                         <th>Delete</th>
                       </tr>
                     </thead>
                     <tbody>

                        {{-- @php($index=1) --}}
                   @foreach ($categories as $category)

                       <tr>
                          <td>{{ $settings->FirstItem()+$loop->index}}</td>
                           <td>{{ $setting->about_app_text }}</td>
                           <td>{{ $setting->contact_phone }}</td>
                           <td>{{ $setting->contact_email }}</td>
                           <td>{{ $setting->notification_setting_text }}</td>

                           <td>{{ $setting->fb_link }}</td>
                           <td>{{ $setting->insta_link }}</td>
                           <td>{{ $setting->tw_link }}</td>
                           <td>{{ $setting->youtube_link }}</td>

                           <td><a href="{{ route('categories.restore', ['id'=>$category->id]) }}" class="btn btn-sm btn-success">Restore</a></td>

                           <td>

      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{ $setting->id }}"> Delete</button>

                        <!-- model -->
   <div class="modal fade" id="modal-default{{ $setting->id }}">
    <!-- start form -->
    <form action="{{ route('settings.destroy', ['setting'=>$setting->id]) }}" method="post">
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
              <p>Are You Sure You Want TO Delete This Setting ! <br>
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
                        <h1 class="text-capitalize">Sorry No Settings Trashed</h1>
                    </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection

