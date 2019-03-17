@extends('layouts.app')

@section('content')
  <h3>Contact Page</h3> 
  @if (count($people))
      @foreach ($people as $person)
          <ul>
            <li>
              {{ $person }}
            </li>
          </ul>
      @endforeach
   @else
    <div>Nothing people</div>
  @endif
@endsection