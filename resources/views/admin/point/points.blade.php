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
                                <h4 class="card-title"> point Details</h4>
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

                                        <a href="{{route('point')}}"> <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> ADD NEW POINT</button></a>

                                        <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>name</th>
                                                    <th>type</th>
                                                    <th>location</th>
                                                    <th>address</th>
                                                    <th>long</th>
                                                    <th>lat</th>
                                                    <th>activity</th>
                                                    <th>action</th>


                                                </tr>
                                            </thead>
                                            @foreach ($points as $point)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="input-chk mr-2">

                                                    </td>
                                                    <td>{{$point->name}}</td>
                                                    <td>{{$point->type}}</td>
                                                    <td>{{$point->location}}</td>
                                                    <td>{{$point->address}}</td>
                                                    <td>{{$point->long}}</td>
                                                    <td>{{$point->lat}}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach($point->activities as $activity)
                                                            <li>{{ $activity->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <span class="dropdown">
                                                            <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                            <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                                <a href="{{route('point-edit',$point->id)}}" class="dropdown-item"><i class="ft-edit-2"></i>
                                                                    Edit</a>
                                                                <form role="form" action="{{route('point-delete',$point->id)}}" method="post">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" class="dropdown-item"><i class="ft-trash-2"></i>DELETE</button>

                                                                </form>
                                                            </span>
                                                        </span>
                                                    </td>



                                                </tr>
                                            </tbody>
                                            @endforeach
                                            </tfoot>
                                        </table>
                                        {{$points->links()}}
                                        
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