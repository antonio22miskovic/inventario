<template>
	<div class="">

  		<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
   			 <div class="container">
      			<a class="navbar-brand" href="/home">  <font-awesome-icon icon="home" /> {{ this.planta.planta }}</a>
      				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        				<span class="navbar-toggler-icon"></span>
      				</button>
      			<div class="collapse navbar-collapse" id="navbarResponsive">
        			<ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" v-on:click="departamento">departamentos</a>
                  </li>

          				<li class="nav-item">
            				  <a class="nav-link" v-on:click="equipo">equipos</a>
          				</li>
          				<li class="nav-item btn-group">
    					         <a class="nav-link" v-on:click="categori">categorias</a>
          				</li>
          				<li class="nav-item">
            				<a class="nav-link" data-toggle="modal" data-target="#info">  <font-awesome-icon icon="building" class="mr-2"/>info</a>
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
                      <p> rif:  {{ this.planta.rif}}</p>

                	</div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              	</div>
            </div>
        </div>
    </div>
    <div class="row p-3">

    	<ListadoEquipos v-if="listado === true"></ListadoEquipos>

      <departamento v-if="depa === true"></departamento>

      <Categoria v-if="registrarcategoria === true"></Categoria>

    </div>

 </div>
</template>
<script>

import Swal from 'sweetalert2'
import departamento from '../components/ListadoEquipos.vue'
import ListadoEquipos from '../components/Departamento.vue'
import Categoria from '../components/Categoria.vue'


	export default{

		components:{

      departamento,
			ListadoEquipos,
      Categoria
		},

		 mounted() {

    		this.info();

		},

		data(){

			return{

				user:[],
    		planta:[],
				listado:false,
				registrarcategoria:false,
        depa: true,

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

				});
			},

				logout(){

				axios.post('logout')
				.then(response =>{
				window.location.href = '/';

				});

			},

			departamento(){

				if (this.listado === true && this.depa === false && this.registrarcategoria === false) {

						this.listado = true;
						this.depa = false;
						this.registrarcategoria = false;

				}else{

            if (this.listado === false && this.depa === true && this.registrarcategoria === false) {

              this.listado = true;
              this.depa = false;
              this.registrarcategoria = false;

            }else{

                this.listado = true;
                this.depa = false;
                this.registrarcategoria = false;

            }
				  }
			},

      equipo(){

       if (this.listado === false  && this.depa === true && this.registrarcategoria === false) {

            this.listado = false;
            this.depa = true;
            this.registrarcategoria = false;

        }else{

            if (this.listado === true && this.depa === false && this.registrarcategoria === false) {

              this.listado = false;
              this.depa = true;
              this.registrarcategoria = false;

            }else{

                this.listado = false;
                this.depa = true;
                this.registrarcategoria = false;

            }
          }

      },

      categori(){

         if (this.listado === false && this.depa === false && this.registrarcategoria === true) {

            this.listado = false;
            this.depa = false;
            this.registrarcategoria = true;

        }else{

            if (this.listado === false && this.depa === false && this.registrarcategoria === false) {

              this.listado = false;
              this.depa = false;
              this.registrarcategoria = true;

            }else{

                this.listado = false;
                this.depa = false;
                this.registrarcategoria = true;

            }
          }


      },

		},
	}
</script>

