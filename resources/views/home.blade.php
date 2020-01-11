@extends('layouts.app' ,['user'=> $user,'plnata'=>$planta])

@section('content')
<div class="container">
<div class="py-4">

	<h4 class="text-center">localidad: {{ $planta->localidad }}</h4>
</div>

      <home></home>


</div>
@endsection
