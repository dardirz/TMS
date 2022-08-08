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
                                <p>you can add a new point.</p>
                            </div>
                            <form class="form" action="{{route('point.custom')}}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i>point details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control border-primary" name="name" placeholder="name">
                                                @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="location">location</label>
                                                <input type="text" class="form-control border-primary" name="location" placeholder="location">
                                                @if ($errors->has('location'))
                                                <span class="text-danger">{{ $errors->first('location') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">address</label>
                                                <input type="text" class="form-control border-primary" name="address" placeholder="address">
                                                @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="long">long</label>
                                                <input type="text" class="form-control border-primary" name="long" placeholder="long">
                                                @if ($errors->has('long'))
                                                <span class="text-danger">{{ $errors->first('long') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lat">lat</label>
                                                <input type="text" class="form-control border-primary" name="lat" placeholder="lat">
                                                @if ($errors->has('lat'))
                                                <span class="text-danger">{{ $errors->first('lat') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="activity">activity</label>
                                                <select class="selectpicker" name="activities[]" multiple>
                                                    @foreach($activities as $activity)
                                                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('activity'))
                                                <span class="text-danger">{{ $errors->first('activity') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="type">type</label>
                                                <select class="custom-select" name="type" id="inputGroupSelect01">
                                                    
                                                    <option value="pharmacy">pharmacy</option>
                                                    <option value="store">store</option>
                                                </select>
                                                @if ($errors->has('type'))
                                                <span class="text-danger">{{ $errors->first('type') }}</span>
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