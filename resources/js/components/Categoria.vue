<template>
	<div class="container">

		<div class="modal fade" id="modalregistrarcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

               			 <form class="form-horizontal" @submit.prevent="registrocat()">
                                <h5 class="text-center"> registra una nueva categoria</h5>
                               <div class="form-group p-3">
                                    <label> nombre de la categoria:</label>
                                    <input type="text" v-model="categoriaregistro.categoria" class="form-control rounded-pill" placeholder=" nombre de la categoria">
                                 </div>
                                 <div class="form-group p-3">
                                    <label> deja una breve descripcion de la categoria:</label>
                                    <input type="text" v-model="categoriaregistro.descripcion" class="form-control rounded-pill" placeholder="breve descripcion" >
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


		<div>
        <div class="modal fade" id="detallesmodalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title " id="exampleModalCenterTitle">nombre de la categoria: {{ this.detalle.categoria}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              <div class="modal-body">
                <div>

                  <p> descripcion:  {{ this.detalle.descripcion}}</p>

                </div>
              </div>
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
                      <form class="form-horizontal" @submit.prevent="update(fillcategoria.id)">
                        <fieldset>
                            <legend class="text-center header">actualizar los datos del categoria</legend>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><label>categoria</label></span>
                              <div class="col justify-content-center">
                                  <input id="categoria" v-model="fillcategoria.categoria" name="categoria" type="text" placeholder="categoria del equipo averiado" class="form-control rounded-pill">
                              </div>
                            </div>

                              <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><label>descripcion</label></span>
                                  <div class="col justify-content-center">
                                      <textarea class="form-control " v-model="fillcategoria.descripcion" id="descripcion" name="descripcion" placeholder="descripcion del equipo averiado" rows="7"></textarea>
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
            <div class="row justify-content-center">
            	<p>desea anadir una nueva categoria: <a class="btn btn-success" data-toggle="modal" data-target="#modalregistrarcategoria"> + </a> </p>
					<table class="table">
         			 	<thead class="thead-dark">
           					<tr>

                				<th scope="col">categoria</th>
                				<th scope="col" class="text-center">editar</th>
                				<th scope="col" class="text-center">eliminar</th>
                				<th scope="col" class="text-center">ver</th>

            				</tr>
          				</thead>
          				<tbody>
            				<p v-if="categorias.length === 0"> no hay categorias</p>

            				<tr v-for="categoria of categorias" :key="categoria.id">

              					<td>{{ categoria.categoria }}</td>

              					<td class="text-center"> <button class="btn btn-primary text-center" data-toggle="modal" data-target="#editar"  @click.prevent="editar(categoria, paginate.current_page)"> editar </button></td>
              					<td class="text-center"><button class="btn btn-danger text-center"  @click.prevent="eliminar(categoria, paginate.current_page)">eliminar</button></td>
              					<td class="text-center"> <button class="btn btn-primary text-center" data-toggle="modal" data-target="#detallesmodalcenter" @click.prevent="detalles(categoria)"> detalles </button></td>

            				</tr>

          				</tbody>
      				</table>

      				<nav aria-label="Page navigation example" >
          				<ul class="pagination ">
            				<li class="page-item" v-if="paginate.current_page > 1" >
                				<a class="page-link" href="#" aria-label="Previous" @click.prevent = "Chagepage( paginate.current_page - 1)">
                    				<span aria-hidden="true">&laquo;</span>
                				</a>
           					 </li >

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
</template>
<script>
import Swal from 'sweetalert2'
export default{

	name:'Categoria',


		components:{

		},


		data() {

    return {

    	categorias:[],

    	categoriaregistro:{
    		'categoria': '',
    		'descripcion': '',
    	},

     	 detalle:[],

      fillcategoria:{
      			'id':'',
                'categoria':'',
                'descripcion':'',

      },

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

  	 registrocat(){

                axios.post('categoria', this.categoriaregistro)
                 .then((response) => {
                   this.categoriaregistro.categoria = '';
                 this.categoriaregistro.descripcion = '';
                 this.listado(this.paginate.current_page);

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
            },

  	Chagepage(page){

  		this.paginate.current_page = page;
  		this.listado(page);

  	},

    listado(page){

        var url = 'categoria?page='+page;
        axios.get(url).then(res=>{
        this.categorias=res.data.categoria.data;
        this.paginate = res.data.paginate;

  })


    },

    editar(categoria, page){

      this.fillcategoria.id = categoria.id;
      this.fillcategoria.categoria = categoria.categoria;
      this.fillcategoria.descripcion = categoria.descripcion;

         },

    update(id){

      axios.put('categoria/'+id, this.fillcategoria).
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

    eliminar(categoria, page){

      Swal.fire({
      title: 'ADVERTENCIA!!',
      text: "si eliminas la categoria eliminaras los equipos vinculados a esta categoria!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {

            axios.delete('categoria/'+categoria.id)
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

    detalles(categoria){

      axios.get('categoria/'+categoria.id)
      .then(res=>{

       this.detalle = res.data.categoria;

       })




    },

  },

  mounted() {

    this.listado(1);

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