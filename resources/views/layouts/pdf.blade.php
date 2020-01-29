<!DOCTYPE html>
<html>
<head>
	 <script src="{{ asset('js/app.js') }}" defer></script>
	<title> pdf </title>
</head>
<body>
	<div class="container">

		<h3 class="text-center"> equipo: {{ $equipo->nombre }}  </h3>
		<h4> modelo: {{ $equipo->modelo }} </h4>
		<h4> marca: {{ $equipo->marca }} </h4>
		<h4> codigo: {{ $equipo->codigo }} </h4>
		<h4> descripcion: {{ $equipo->descripcion }} </h4>
			<br>
    	<h3> departamento:  {{ $departamento->departamento }}</h3>
    	<h4> descrpcion del departamento: {{ $departamento->descripcion }}</h4>
    		<br>
    	<h3> planta: {{ $planta->planta }}</h3>
    	<h4>descripcion de la planta: {{ $planta->descripcion }}</h4>
	</div>
</body>
</html>