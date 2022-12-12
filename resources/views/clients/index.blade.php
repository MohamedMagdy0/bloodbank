@extends('layouts.dashboard.app_master')
@section('page_title')
    Clients
@endsection

@section('content')



    <!-- searsh -->
    <div class="container mb-l">
        <div class="mb-1 w-25">
            <form action="" method="get">

                <div class="input-group">
                    <input type="search" name="keyword" value="{{ request('keyword') }}" class="form-control"
                        placeholder="Search here !">
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

    @if (session('success'))
        <div class="alert alert-success text-center">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    <section class="">
        <div class="card ">
            <div class="card-header text-center">
                {{-- <h3>All Clients : {{ count($clients) }}</h3> --}}
            </div><!-- card-header -->


            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h3>{{ session('success') }}</h3>
                    </div>
                @endif

                @if (count($clients) > 0)
                    <table class="table table-responsive table-sm text-center mx-auto">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>phone</th>

                                <th>Is Active</th>
                                <th>Status</th>

                                <th>Date of Birth</th>
                                <th>Last Donation Date</th>

                                <th>Blood Type Id</th>
                                <th>City Id</th>
                                <th>governorate_id</th>

                                <th>Pin Num</th>
                                <th>Api Token</th>

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @php($index=1) --}}
                            @foreach ($clients as $client)
                                <tr class="text-center">
                                    <td>{{ $clients->FirstItem() + $loop->index }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->password }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td class="my-auto">
                                        @if ($client->is_active == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactivate</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('users.isActive', ['id' => $client->id]) }}" method="post">
                                            @csrf

                                            @if ($client->is_active == 1)
                                                <input type="hidden" name="is_active" value="0"
                                                    class="btn btn-sm btn-warning">
                                                <button type="submit" class="btn btn-sm btn-danger">deactivate</button>
                                            @elseif ($client->is_active == 0)
                                                <input type="hidden" name="is_active" value="1"
                                                    class="btn btn-sm btn-success mb-1">
                                                <button type="submit" class="btn btn-sm btn-success">activate</button>
                                            @endif




                                        </form>
                                    </td>

                                    <td>{{ $client->d_o_b }}</td>
                                    <td>{{ $client->last_donation_date }}</td>
                                    <td>{{ $client->blood_type_id }}</td>
                                    <td>{{ $client->city_id }}</td>
                                    <td>{{ $client->governorate_id }}</td>
                                    <td>{{ $client->pin_num }}</td>
                                    <td>{{ $client->api_token }}</td>
                                    <td><a href="{{ route('clients.edit', ['client' => $client->id]) }}"
                                            class="btn btn-sm btn-success">Edit</a></td>

                                    <td>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-default{{ $client->id }}"> Delete</button>

                                        <!-- model -->
                                        <div class="modal fade" id="modal-default{{ $client->id }}">
                                            <!-- start form -->
                                            <form action="{{ route('clients.softDelete', ['id' => $client->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header bg-danger text-white">
                                                            <h4 class="modal-title">
                                                                <h4>Delete Confirmation</h4>
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div><!-- modal-header -->

                                                        <div class="modal-body text-danger">
                                                            <p>Are You Sure You Want TO Delete This Client : <span
                                                                    class="text-primary">{{ $client->name }}</span> <br>
                                                                It Will Be Deleted Permenantly &hellip;</p>
                                                        </div><!-- modal-body -->

                                                        <div class="modal-footer justify-content-between bg-danger">
                                                            <button type="submit" class="btn btn-default"
                                                                data-dismiss="modal">Close</button>
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
                        <h1 class="text-capitalize">Sorry No clients</h1>
                    </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                <div>{{ $clients->links() }}</div>
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
