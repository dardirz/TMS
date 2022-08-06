@extends('master')
@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
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
                            <div class="card-body">
                                <div class="card-text">
                                    <p>you can edit a user.</p>
                                </div>
                                <form class="form" action="{{ route('point.update',$point->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="la la-eye"></i> User Details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" class="form-control border-primary"
                                                        placeholder="Name" name="name" value="{{$trip->name}}">
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="type">type</label>
                                                    <input type="text" id="type" class="form-control border-primary"
                                                        placeholder="type" name="type" value="{{$trip->type}}">
                                                    @if ($errors->has('type'))
                                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">location</label>
                                                    <input type="text" id="location" class="form-control border-primary"
                                                        placeholder="location" name="location" value="{{$trip->location}}">
                                                    @if ($errors->has('location'))
                                                        <span class="text-danger">{{ $errors->first('location') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">address</label>
                                                    <input type="text" id="address" class="form-control border-primary"
                                                        placeholder="address" name="address" value="{{$trip->address}}">
                                                    @if ($errors->has('address'))
                                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="latitude">latitude</label>
                                                    <input type="text" id="latitude" class="form-control border-primary"
                                                        placeholder="latitude" name="latitude" value="{{$trip->latitude}}">
                                                    @if ($errors->has('latitude'))
                                                        <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="longitude">longitude</label>
                                                    <input type="text" id="longitude" class="form-control border-primary"
                                                        placeholder="longitude" name="longitude" value="{{$trip->longitude}}">
                                                    @if ($errors->has('longitude'))
                                                        <span class="text-danger">{{ $errors->first('longitude') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="activity">activity</label>
                                                    <input type="text" id="activity" class="form-control border-primary"
                                                        placeholder="Name" name="activity" value="{{$trip->activity}}">
                                                    @if ($errors->has('activity'))
                                                        <span class="text-danger">{{ $errors->first('activity') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
