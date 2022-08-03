@extends('master')
@section('content')
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Dashboard</h4>


                    <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                    </thead>
                    @foreach ($user as $LoggedUserInfo )
                    <tbody>
                        <tr>

                            <td>{{$LoggedUserInfo['name']}}</td>
                            <td>{{$LoggedUserInfo['email']}}</td>
                            <td>{{$LoggedUserInfo['phone']}}</td>

                        </tr>
                    </tbody>
                    @endforeach

                </table>
                </div>
            </div>
        </div>




        </div>
</body>
@endsection
