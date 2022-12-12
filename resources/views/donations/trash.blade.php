@extends('layouts.dashboard.app_master')
@section('page_title')
Donations Trash
@endsection

@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Donation Request Trash : {{ count($donations) }}</h3>
            </div><!-- card-header -->


     <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success text-center">
                <h3>{{ session('success') }}</h3>
            </div>
        @endif

                @if (count($donations)>0)

                  <th>ID</th>

                         <th>ID</th>

                         <th>Patient Name</th>
                         <th>Hospital Name</th>
                         <th>Hospital Address</th>

                         <th>Patient Age</th>
                         <th>Bags Num</th>
                         <th>Patient Phone</th>

                         <th>Latitude</th>
                         <th>Longitude</th>
                         <th>Notes</th>

                         <th>Governorate Id</th>
                         <th>City Id</th>
                         <th>Blood Type Id</th>
                         <th>Client Id</th>

                         <th>Restore</th>
                         <th>Delete</th>
                       </tr>
                     </thead>
                     <tbody>


                   @foreach ($donations as $donation)

                       <tr>
                          <td>{{ $donations->FirstItem()+$loop->index}}</td>

                           <td>{{ $donation->patient_name }}</td>
                           <td>{{ $donation->hospital_name }}</td>
                           <td>{{ $donation->hospital_address }}</td>

                           <td>{{ $donation->patient_age }}</td>
                           <td>{{ $donation->bags_num }}</td>
                           <td>{{ $donation->patient_phone }}</td>

                           <td>{{ $donation->latitude }}</td>
                           <td>{{ $donation->longitude }}</td>
                           <td>{{ $donation->notes }}</td>

                           <td>{{ $donation->governorate_id }}</td>
                           <td>{{ $donation->city_id }}</td>
                           <td>{{ $donation->blood_type_id }}</td>
                           <td>{{ $donation->client_id }}</td>

                           <td><a href="{{ route('donations.restore', ['id'=>$donation->id]) }}" class="btn btn-sm btn-success">Restore</a></td>

                           <td>


      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{ $donation->id }}"> Delete</button>

                        <!-- model -->
   <div class="modal fade" id="modal-default{{ $donation->id }}">
    <!-- start form -->
    <form action="{{ route('donations.destroy', ['donation'=>$donation->id]) }}" method="post">
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
              <p>Are You Sure You Want TO Delete This Patient : <span class="text-primary">{{ $donation->patient_name }}</span> <br>
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
                        <h1 class="text-capitalize">Sorry No Donations Trashed</h1>

                   </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                <div>{{ $donation->links() }}</div>
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection

