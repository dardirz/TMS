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
                                <p>you can edit a trip.</p>
                            </div>
                            <form class="form" action="{{ route('trip-update',$trip->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> Trip Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">driver</label>
                                                <select class="custom-select w-50 ml-5" name="user_id" id="inputGroupSelect01">
                                                    @foreach($users as $user)
                                                    <option value="{{$user->id}}" @if($user->id==$trip->id) selected="selected" @endif>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('user_id'))
                                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="begin">begin</label>
                                                <input type="text" id="begin" class="form-control border-primary" placeholder="hour:min" name="begin" value="{{$trip->begin}}">
                                                @if ($errors->has('begin'))
                                                <span class="text-danger">{{ $errors->first('begin') }}</span>
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