

@extends('master')
@section('content')
@livewireStyles
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-6">
                <h4>Dashboard</h4>
                <livewire:user-table>

            </div>
        </div>
    </div>
@livewireScripts
@endsection

