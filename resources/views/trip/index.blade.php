
@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-6">


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
                                <div class="card-content">
                                    <div class="card-body">
                                      <!-- Task List table -->
                                      <div class="table-responsive">

                                        <a href="{{ route('trip.store') }}" > <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i>  ADD NEW USER</button></a>

                                            <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>time</th>



                                                </tr>
                                            </thead>
                                            @foreach ($trip as $user)
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="input-chk">
                                                        </td>
                                                        <td>{{ $user->name }}</td>
                                                        <td class="text-center">{{ $user->time }}</td>

                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"
                                                                    class="btn btn-primary dropdown-toggle dropdown-menu-right"><i
                                                                        class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2"
                                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <a href="{{ route('trip.edit', $user->id) }}"
                                                                        class="dropdown-item"><i class="ft-edit-2"></i>
                                                                        Edit</a>
                                                                    <form role="form"
                                                                        action="{{ route('trip.delete', $user->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="submit" class="dropdown-item"><i
                                                                                class="ft-trash-2"></i>DELETE</button>

                                                                    </form>
                                                                </span>
                                                            </span>
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
                    </div>
                </section>

            </div>
        </div>



    </div>

    @endsection
