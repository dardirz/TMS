@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-6">
                <h4>Dashboard</h4>

                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> User Details</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <a href="{{ route('register-user') }}" class="btn btn-primary btn-min-width box-shadow-1 mr-1 mb-1"> ADD NEW USER</a>
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>

                                                </tr>
                                            </thead>
                                            @foreach ($user as $user)
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td><a href="{{ route('user-edit', $user->id) }}" class="btn btn-primary btn-min-width box-shadow-1 mr-1 mb-1">edit</a></td>
                                                        <td>
                                                            <form role="form" action="{{route('user-delete',$user->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                  <button type="submit"class="btn btn-danger btn-min-width box-shadow-1 mr-1 mb-1">DELETE</button>
                                                                
                                                            </form>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            @endforeach
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
