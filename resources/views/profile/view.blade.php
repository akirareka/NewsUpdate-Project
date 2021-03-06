 @extends('layouts.app')

@section('css')
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.card img {
  border-radius: 80px;
}
@endsection

@section('content')
@foreach($user as $users)
<div class="card" style="margin-bottom:30px ;">
    <div class="card-body">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{url("/images/{$users->photo}")}}" width="150px">
            </div>
            <div class="col-12 editprofile" >
                <center><p class="h1 card-title">{{ $users->name }}</p><center>
                <p>{{$users->email}}<br>
                <p>{{$users->jenis_kelamin}}
                <p>{{$users->phone}}<br><br>
                <a href="profile/edit/{{$users->id}}" >
                 <button>Edit Profile</button> </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection