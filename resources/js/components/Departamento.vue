<template>
	<div>

		<div>
        <div class="modal fade" id="detallesmodalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title " id="exampleModalCenterTitle">nombre del departamento: {{ this.detalle.departamento}}</h5>
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
                      <form class="form-horizontal" @submit.prevent="update(filldepartamento.id)">
                        <fieldset>
                            <legend class="text-center header">actualizar los datos del departamento</legend>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"><label>departamento</label></span>
                              <div class="col justify-content-center">
                                  <input id="departamento" v-model="filldepartamento.departamento" name="departamento" type="text" placeholder="departamento del equipo averiado" class="form-control rounded-pill">
                              </div>
                            </div>

                              <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center"><label>descripcion</label></span>
                                  <div class="col justify-content-center">
                                      <textarea class="form-control " v-model="filldepartamento.descripcion" id="descripcion" name="descripcion" placeholder="descripcion del equipo averiado" rows="7"></textarea>
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
                <div class="col-md-14 p-4">
					<table class="table">
         			 	<thead class="thead-dark">
           					<tr>

                				<th scope="col">#</th>
                				<th scope="col">departamento</th>
                				<th scope="col" class="text-center">editar</th>
                				<th scope="col" class="text-center">eliminar</th>
                				<th scope="col" class="text-center">ver</th>

            				</tr>
          				</thead>
          				<tbody>
            				<p v-if="departamentos === 0"> no hay departamentos registrados</p>

            				<tr v-for="departamento of departamentos" :key="departamento.id">

              					<th scope="row"> {{ departamento.id }}</th>
              					<td>t{{ departamento.departamento }}</td>

              					<td class="text-center"> <button class="btn btn-primary text-center" data-toggle="modal" data-target="#editar"  @click.prevent="editar(departamento, paginate.current_page)"> editar </button></td>
              					<td class="text-center"><button class="btn btn-danger text-center"  @click.prevent="eliminar(departamento, paginate.current_page)">eliminar</button></td>
              					<td class="text-center"> <button class="btn btn-primary text-center" data-toggle="modal" data-target="#detallesmodalcenter" @click.prevent="detalles(departamento)"> detalles </button></td>

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

	</div>
</template>
<script>
import Swal from 'sweetalert2'
export default{

	name:'Departamento',


		components:{

		},


		data() {
    return {

  		departamentos:[],

     	 detalle:[],

      filldepartamento:{
      			'id':'',
                'departamento': '',
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

  	Chagepage(page){

  		this.paginate.current_page = page;
  		this.listado(page);

  	},

    listado(page){

        var url = 'departamento?page='+page;
        axios.get(url).then(res=>{
        this.departamentos=res.data.departamento.data;
        this.paginate = res.data.paginate;
  })

    },

    editar(departamento, page){

      this.filldepartamento.id = departamento.id;
      this.filldepartamento.departamento = departamento.departamento;
      this.filldepartamento.descripcion = departamento.descripcion;
      console.log(this.filldepartamento)
     },

    update(id){

      axios.put('departamento/'+id, this.filldepartamento).
      then(response =>{
      	console.log(this.filldepartamento)
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

    eliminar(departamento, page){

      Swal.fire({
      title: 'ADVERTENCIA!!',
      text: "si eliminas el departamento eliminaras los equipos vinculados a este departamento!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {

            axios.delete('departamento/'+departamento.id)
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

    detalles(departamento){

      axios.get('departamento/'+departamento.id)
      .then(res=>{

       this.detalle = res.data.datos;
       console.log(this.detalle)


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