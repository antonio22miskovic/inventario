<template>
	<b-container>

    <div>
        <div class="modal fade" id="detallesmodalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title " id="exampleModalCenterTitle">nombre del equipo: {{ this.detalle.nombre }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              <div class="modal-body">
                <div>
                  <p> codigo:  {{ this.detalle.codigo }}</p>
                  <p> marca:  {{ this.detalle.marca }}</p>
                  <p> modelo:  {{ this.detalle.modelo}}</p>
                  <p> descripcion:  {{ this.detalle.descripcion}}</p>

                  <h5> categoria del equipo </h5>
                  <p> categoria:  {{ this.categoria.categoria }}</p>
                  <p> descripcion de la categoria:  {{ this.categoria.descripcion}}</p>

                  <h5> departamento: {{ this.depadetalles.departamento }}</h5>
                  <p> descripcion del departamento: {{ this.depadetalles.descripcion }}</p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
        </div>
      </div>
    </div>

        <div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title " id="exampleModalCenterTitle"> registra un nuevo equipo </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              <div class="modal-body">
                <example></example>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
        </div>
      </div>
    </div>


    <div>
      <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title text-center " id="exampleModalCenterTitle">actualizar los datos</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal" @submit.prevent="update(fillequipo.id)">
                        <fieldset>
                            <legend class="text-center header">actualizar los datos del equipo averiado</legend>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><label>nombre</label></span>
                              <div class="col justify-content-center">
                                  <input id="nombre" v-model="fillequipo.nombre" name="nombre" type="text" placeholder="nombre del equipo averiado" class="form-control rounded-pill">
                              </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><label>modelo</label></span>
                                <div class="col justify-content-center">
                                    <input id="modelo" v-model="fillequipo.modelo" name="modelo" type="text" placeholder="modelo del equipo" class="form-control rounded-pill">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><label>marca</label></span>
                                <div class="col justify-content-center">
                                    <input id="marca" v-model="fillequipo.marca" name="marca" type="text" placeholder="marca del equipo" class="form-control rounded-pill">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><label>codigo</label></span>
                                <div class="col justify-content-center">
                                    <input id="codigo" v-model="fillequipo.codigo" name="codigo" type="text" placeholder="codigo del equipo" class="form-control rounded-pill">
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><label> departamento</label></span>
                                <div class="col justify-content-center">
                                  <select  id="categoria"
                                  v-model="fillequipo.departamento"
                                  class="form-control rounded-pill">

                                     <option v-for="departamento of departamentos" :key="departamento.id" :value="departamento.id"> {{departamento.departamento }}</option>
                                  </select>
                                </div>
                              </div>


                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><label>categoria</label></span>
                                <div class="col justify-content-center">
                                  <select  id="categoria"
                                  v-model="fillequipo.categoria"
                                  name="categoria"
                                  class="form-control rounded-pill">

                                     <option v-for="valor of valores" :key="valor.id" :value="valor.id"> {{valor.categoria }}</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><label>descripcion</label></span>
                                  <div class="col justify-content-center">
                                      <textarea class="form-control" v-model="fillequipo.descripcion" id="descripcion" name="descripcion" placeholder="descripcion del equipo averiado" rows="7"></textarea>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">actualizar</button>
                                    </div>

                                </div>

                            </fieldset>

                          </form>

                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

          <div class="container">

          <div class="row">

            <div class="col-sm-6">

               <p>desea anadir un nuevo equipo: <a class="btn btn-outline-success rounded-pill" data-toggle="modal" data-target="#registrar"> <font-awesome-icon icon="plus" /> </a> </p>
            </div>

            <div class="col-sm-6">

              <form @submit.prevent="filtro()">

                <div class="container">

                  <div class="row">

                      <div class="col">

                      <input type="text" name="codigo" v-model="filtrar" placeholder="codigo" class="form-control rounded-pill">

                      </div>

                      <div class="col-sm-1">

                      <button type="submit" class="btn btn-outline-primary rounded-pill">
                          <font-awesome-icon icon="search" />
                      </button>

                       </div>

                  </div>

                  <div class="text-center">

                      <p class="text-danger" v-if="validarfiltrado == 2"> <small> verifique su codigo </small> </p>

                 <p class="text-danger" v-if="validarfiltrado2 == 2"> <small>  debe introducir el codigo </small> </p>

                  </div>

                </div>



              </form>



            </div>

          </div>

          </div>

          <form @submit.prevent="buscar()">

                <div class="form-group">

                    <span class="text-center">
                      <label class="text-center">seleccione un departamento para la busqueda</label>
                    </span>
                      <div class="col justify-content-center">

                          <select id="categoria"
                                  v-model="depa"
                                  name="categoria"
                                  class="form-control rounded-pill">

                            <option v-for=" departamento of  departamentos" :key=" departamento.id" :value="departamento.id"> {{ departamento.departamento }}</option>

                          </select>

                          <div class=" text-center">

                             <button class="btn btn-outline-primary m-3 rounded-pill" type="submit"><font-awesome-icon icon="search" />
                             buscar </button>

                          </div>

                      </div>

                  </div>

          </form>

            <p v-if="mensaje === 2" class="text-danger text-center"> debe seleccionar un departamento </p>

          <div class="alert alert-success alert-dismissible fade show rounded-pill" role="alert" v-if="equipos.length === 0" >

            <strong> mensaje !</strong> debe selecionar un departamento para la busqueda del equipo averiado

        </div>

        <div v-else>

          <div class="container">

            <div class="row justify-content-center">

	     <table class="table">

          <thead class="thead-dark">

            <tr>

                <th scope="col">nombre</th>
                <th scope="col">codigo</th>
                <th scope="col" class="text-center">editar</th>
                <th scope="col" class="text-center">eliminar</th>
                <th scope="col" class="text-center">ver</th>
                <th scope="col" class="text-center">pdf</th>

            </tr>

          </thead>

          <tbody>

            <tr v-for="equipo of equipos" :key="equipo.id">

              <td>t{{ equipo.nombre }}</td>
              <td>{{ equipo.codigo }}</td>
              <td class="text-center">
                <button class="btn btn-outline-warning text-center" data-toggle="modal" data-target="#editar"  @click.prevent="editar(equipo, paginate.current_page)">
                    <font-awesome-icon icon="marker" />
                  </button>

                </td>

              <td class="text-center">
                <button class="btn btn-outline-danger text-center"  @click.prevent="eliminar(equipo, paginate.current_page)">
                  <font-awesome-icon icon="trash" />
                </button>
              </td>

              <td class="text-center">
               <button class="btn btn-outline-primary text-center" data-toggle="modal" data-target="#detallesmodalcenter" @click.prevent="detalles(equipo)">
                 <font-awesome-icon icon="eye" />
               </button>
             </td>

              <td class="text-center">
                <button class=" btn btn-outline-secondary text-center" @click="pdf(equipo)">
                 <font-awesome-icon icon="print" />
               </button>
             </td>

            </tr>

          </tbody>

      </table>

      <nav aria-label="Page navigation example" >
          <ul class="pagination ">
            <li class="page-item" v-if="paginate.current_page > 1" >
                <a class="page-link" href="#" aria-label="Previous" @click.prevent = "Chagepage( paginate.current_page - 1)">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li class="page-item" v-for="page in nuPages" :class="[page == esActivo ? 'active' : '']">

    	         <a class="page-link" href="#"@click.prevent = "Chagepage( page)" >{{ page }}</a>

            </li>

            <li class="page-item" v-if="paginate.current_page  < paginate.last_page">
                <a class="page-link" href="#" aria-label="Previous" @click.prevent = "Chagepage( paginate.current_page + 1)">
                      <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
          </ul>
      </nav>
    </div>
  </div>
    </div>
    </div>
	</b-container>
</template>
<script>
import Swal from 'sweetalert2'
import example from '../components/ExampleComponent.vue'

	export default{

		name:'ListadoEquipos',

		components:{
       example,
		},


		data() {
    return {

      validarfiltrado: 1,
      validarfiltrado2: 1,
      depadetalles:[],
      filtrar:'',
  		equipos:[],
      mensaje:1,
      detalle:[],
      inicio: 'debe selecionar un departamento para la busqueda del equipo averiado',
      valores:[],

      departamentos:[],

      depa:'',

      fillequipo:{
                'id': '',
                'nombre':'',
                'modelo':'',
                'marca':'',
                'codigo':'',
                'descripcion':'',
                'categoria': '',
                'departamento':'',

      },

      categoria:[],

  		paginate:{

                'tota': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to' : 0,

            },


  }
},
  methods: {

    pdf(equipo){

      let datos = equipo.id;
            window.open('/pdf/'+ datos);

    },

    filtro(){

        this.mensaje = 1;

      if (this.filtrar.length === 0) {

        this.validarfiltrado = 1;
        this.validarfiltrado2 = 2;

      }else{
        this.validarfiltrado2 = 1;
      let url = 'filtro/'+ this.filtrar;

      axios.get(url).then((res) =>{

         var e = res.data

        if (e == 1) {

            this.validarfiltrado = 2;

        }else{
            this.validarfiltrado2 = 1;
            this.validarfiltrado = 1;
          this.equipos = res.data;

        }

      })
    }

    },

  	Chagepage(page){

  		this.paginate.current_page = page;
  		this.listado(page);

  	},

    listado(page){

        var url = 'equipo/listado/'+ this.depa +'?page='+page;
        axios.get(url).then(res=>{

        this.equipos=res.data.equipo.data;
        this.paginate = res.data.paginate;
  })

    },

    editar(equipo, page){

      this.fillequipo.id = equipo.id;
      this.fillequipo.nombre = equipo.nombre;
      this.fillequipo.modelo = equipo.modelo;
      this.fillequipo.marca = equipo.marca;
      this.fillequipo.codigo = equipo.codigo;
      this.fillequipo.descripcion = equipo.descripcion;
      this.fillequipo.categoria = equipo.categoria_id;
      this.fillequipo.departamento = equipo.departamento_id;

      axios.get('/select/categoria')
             .then((response) => {
            this.valores = response.data;
             })

    },

    update(id){

      axios.put('equipo/'+id, this.fillequipo).
      then(response =>{

        this.listado(this.paginate.current_page);

        Swal.fire({
        position: 'center',
        icon: 'success',
        title: ' se ah actualizado con exito',
        showConfirmButton: false,
        timer: 1500
})

      })

    },

    select(){

      axios.get('select')
             .then((response) => {
            this.departamentos = response.data.depa;

             })


    },

    buscar(){
       if (this.depa.length === 0) {

             this.mensaje = 2;
              this.validarfiltrado = 1;
            this.validarfiltrado2 = 1;

        }else{

            this.filtrar = '';
           this.mensaje = 1;
           this.validarfiltrado = 1;
            this.validarfiltrado2 = 1;

          this.listado(1)
        }
    },

    eliminar(equipo, page){

      Swal.fire({
      title: 'estas seguro?',
      text: "deseas eliminar al equipo averiado!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {

            axios.delete('equipo/'+equipo.id)
            .then(res=>{
              this.listado(page)

       })
            Swal.fire(
            'eliminado',
            'se ah eliminado con exito.',
            'success'
    )
  }
})

    },

    detalles(equipo){

      axios.get('equipo/'+equipo.id)
      .then(res=>{

       this.detalle = res.data.equipo;
       this.categoria = res.data.equipo.categoria;
      this.depadetalles = res.data.equipo.departamento;

       })

    },

  },

  mounted() {

    this.select();

},

computed:{

	esActivo: function(){
			return this.paginate.current_page;
	},

	nuPages: function(){

		if (!this.paginate.to) {
			return [];
		}

		var from = this.paginate.current_page - 5 //todo
		if (from < 1) {
			from = 1;
		}

		var to = from + (5 * 5);
		if (to >= this.paginate.last_page) {
			to = this.paginate.last_page;
		}

		var pageArray = [];

		while(from <= to){

			pageArray.push(from);
			from++;
		}

		return pageArray;

	}

},

	}
</script>