@extends('applicant.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-3">
         <ul class="list-group">
              <li class="list-group-item">
                  <a href="{{ route('applicant.dashboard') }}">Home</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('profile.index',Auth::guard('applicant')->user()->id) }}">profile</a>
              </li>
              <li class="list-group-item">
                  <a href="{{ route('profile.showjob') }}">View Job Post</a>
              </li>
        </ul>
     </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Applicant :: Dashboard</div>

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
