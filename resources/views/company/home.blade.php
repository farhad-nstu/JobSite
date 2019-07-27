@extends('company.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

     
     <div class="col-md-3">
         <ul class="list-group">
              <li class="list-group-item">
                  <a href="{{ route('company.dashboard') }}">Home</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('job.create') }}">Job</a>
              </li>
        </ul>
     </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Company :: Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
