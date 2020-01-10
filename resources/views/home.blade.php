@extends('layouts.app' ,['user'=> $user,'plnata'=>$planta])

@section('content')
<div class="container">
<div class="py-4">


</div>
{{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" name="logout" value="logout">
                                    </form> --}}
       <example-component></example-component>

</div>
@endsection
