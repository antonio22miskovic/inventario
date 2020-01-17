<template>
	<div class="">

  		<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
   			 <div class="container">
      			<a class="navbar-brand" href="#"> {{ this.planta.planta }}</a>
      				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        				<span class="navbar-toggler-icon"></span>
      				</button>
      			<div class="collapse navbar-collapse" id="navbarResponsive">
        			<ul class="navbar-nav ml-auto">
          				<li class="nav-item active">
           					 <a class="nav-link" href="#">Home
              					<span class="sr-only">(current)</span>
            				</a>
          				</li>
          				<li class="nav-item">
            				<a class="nav-link" v-on:click="cambiar">{{ this.button }}</a>
          				</li>
          				<li class="nav-item">
            				<a class="nav-link" data-toggle="modal" data-target="#info">info</a>
          				</li>
          				<li class="nav-item">
            				<a class="nav-link" v-on:click="logout">logout</a>
          				</li>
        			</ul>
      			</div>
    		</div>
  		</nav>

	<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title " id="exampleModalCenterTitle">nombre de la planta: {{ this.planta.planta  }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              	<div class="modal-body">
               		<div>

                 		<h5>localidad: {{ this.planta.localidad}} </h5>
                  		<p> descripcion:  {{ this.planta.descripcion }}</p>

                	</div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              	</div>
            </div>
        </div>
    </div>

    <div class="row p-3">

    	<example v-if="registrar === true"></example>
    	<ListadoEquipos v-if="listado === true"></ListadoEquipos>

    </div>

 </div>
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

				user:[],
    			planta:[],
				listado:false,
				registrar:true,
				button: 'listado',

			}
		},


		methods:{
			info(){

				axios.get('info')
				.then(response =>{
					this.user = response.data.user;
					this.planta = response.data.user.planta;
					console.log(this.user)
					console.log(this.planta)
				});
			},

				logout(){

				axios.post('logout')
				.then(response =>{
				window.location.href = '/';

				});

			},

			cambiar(){

				if (this.listado === true && this.registrar === false) {

						this.listado = false;
						this.registrar = true;
						this.button = 'listado';
				}else{

						this.listado = true;
						this.registrar = false;
						this.button = 'registrar';
				}
			},
		},

		 mounted() {

    		this.info();

		},
	}
</script>

