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
          				<li class="nav-item btn-group">
    						<a class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >categoria</a>

    						 <div class="dropdown-menu dropdown-menu-right">

   						 		<a class="dropdown-item" data-toggle="modal" data-target="#categoria" > + </a>
						    	<button class="dropdown-item" type="button">listado</button>

  							</div>

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

    <div class="modal fade" id="categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title " id="exampleModalCenterTitle">agrega una nueva categoria</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              	<div class="modal-body">
               		<div>

               			 <form class="form-horizontal" @submit.prevent="registrarcategoria">
                                <h5 class="text-center"> registra una nueva categoria</h5>
                               <div class="form-group p-3">
                                    <label> nombre de la categoria:</label>
                                    <input type="text" v-model="categoria.categoria" class="form-control rounded-pill" placeholder=" nombre de la categoria">
                                 </div>
                                 <div class="form-group p-3">
                                    <label> deja una breve descripcion de la categoria:</label>
                                    <input type="text" v-model="categoria.descripcion" class="form-control rounded-pill" placeholder="breve descripcion" >
                                </div>
                                <div class="container text-center">
                                    <button type="submit" class="btn btn-primary rounded-pill"> agregar </button>
                                </div>
                            </form>

                	</div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>

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
import Swal from 'sweetalert2'
import ListadoEquipos from '../components/ListadoEquipos.vue'
import example from '../components/ExampleComponent.vue'
	export default{

		components:{
			example,

			ListadoEquipos
		},

		 mounted() {

    		this.info();

		},

		data(){

			return{

				user:[],
    			planta:[],
				listado:false,
				registrar:true,

				button: 'listado',
				categoria:[{
                    'categoria':'',
                    'descripcion':''
                }],

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

			 registrarcategoria(){

                const cat = {
                    'categoria': this.categoria.categoria,
                    'descripcion' : this.categoria.descripcion
                };

                axios.post('categoria', cat)
                 .then((response) => {
                    this.categoria.categoria = '';
                 this.categoria.descripcion = '';

                Swal.fire({
        		position: 'center',
        		icon: 'success',
        		title: ' se ah registrado con exito',
        		showConfirmButton: false,
        		timer: 1500

                        });

                      })
                  .catch((error) => {
                      if (error.response) {

                             console.log(error.response.data);
                             console.log(error.response.status);
                             console.log(error.response.headers);

                     } else if (error.request) {

                            console.log(error.request);
                     } else {

                            console.log('Error', error.message);
                     }
                 });
            }

		},
	}
</script>

