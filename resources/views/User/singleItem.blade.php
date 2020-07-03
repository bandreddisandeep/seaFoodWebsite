@include('User.header')
@foreach($web as $web)

      <div class='card'>
  <div class='card-heading'><h3>{{$web->name}}</h3></div>
        <div class='card-content'>{{$web->email}}
        </div>
      </div>
      @endforeach
