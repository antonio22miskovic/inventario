<template>

	<b-container class="text-center ">

    	<button class="btn btn-primary sm-auto" @click="cambiar">{{ this.button }}</button>



    <example v-if="registrar === true"></example>

    <ListadoEquipos v-if=" listado === true"></ListadoEquipos>


	</b-container>
</template>
<script>

import ListadoEquipos from '../components/ListadoEquipos.vue'
import example from '../components/ExampleComponent.vue'
	export default{

		components:{
			example,
			ListadoEquipos
		},


		data(){
			return{

				listado:false,
				registrar:true,
				button: 'listado de equipos averiados',


			}
		},


		methods:{
			cambiar(){

				if (this.listado === true && this.registrar === false) {

						this.listado = false;
						this.registrar = true;
						this.button = 'listado de equipos averiados';
				}else{

						this.listado = true;
						this.registrar = false;
						this.button = 'registrar un nuevo equipo averiado';
				}
			},



		},
	}
</script>