@extends('layouts.dashboard.app_master')
@section('page_title')
    Governorates
@endsection

@section('content')
    <section class="container">
        <div class="card  ">
            <div class="card-header  text-center">
                <h3>All Governorates : {{ count($governorates) }}</h3>
            </div><!-- card-header -->


            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <h3>{{ session('success') }}</h3>
                    </div>
                @endif

                @if (count($governorates) > 0)
                    <table class="table table-responsive-lg table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @php($index=1) --}}
                            @foreach ($governorates as $governorate)
                                <tr>
                                    <td>{{ $governorates->FirstItem() + $loop->index }}</td>
                                    <td>{{ $governorate->name }}</td>
                                    <td><a href="{{ route('governorates.edit', ['governorate' => $governorate->id]) }}"
                                            class="btn btn-sm btn-success">Edit</a></td>

                                    <td>

                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal-default{{ $governorate->id }}"> Delete</button>

                                        <!-- model -->
                                        <div class="modal fade" id="modal-default{{ $governorate->id }}">
                                            <!-- start form -->
                                            <form action="{{ route('governorates.softDelete', ['id' => $governorate->id]) }}"
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
                                                            <p>Are You Sure You Want TO Delete This Governorate : <span
                                                                    class="text-primary">{{ $governorate->name }}</span>
                                                                <br>
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
                        <h1 class="text-capitalize">Sorry No Governorates</h1>
                        <a class="linked text-primary" href="{{ route('governorates.create') }}">If You Want To Create
                            Please Click Here</a>
                    </div><!-- alert elseif -->
                @endif

            </div><!-- card-body -->

            <div class="card-footer ">
                <div>{{ $governorates->links() }}</div>
            </div><!-- card-footer -->

        </div><!-- card -->
    </section><!-- container -->
@endsection
