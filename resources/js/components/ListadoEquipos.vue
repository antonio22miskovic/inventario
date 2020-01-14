<template>
	<b-container>
		<!-- <button @click="listado"> listado</button> -->
		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">nombre</th>
      <th scope="col">modelo</th>
      <th scope="col">marca</th>
       <th scope="col">codigo</th>
        <th scope="col" class="text-center">editar equipo</th>
        <th scope="col" class="text-center">eliminar el equipo</th>
         <th scope="col" class="text-center">detalles</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="equipo of equipos" :key="equipo.id">
      <th scope="row"> {{ equipo.id }}</th>
      <td>t{{ equipo.nombre }}</td>
      <td>{{ equipo.modelo }}</td>
      <td>{{ equipo.marca }}</td>
       <td>{{ equipo.codigo }}</td>
         <td class="text-center"> <button class="btn btn-primary text-center"  @click.prevent="editar(equipo, paginate.current_page)"> editar </button></td>
           <td class="text-center"><button class="btn btn-danger text-center"  @click.prevent="eliminar(equipo, paginate.current_page)">eliminar</button></td>
            <td class="text-center"> <button class="btn btn-primary text-center" @click.prevent="detalles(equipo, paginate.current_page)"> detalles </button></td>
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
	</b-container>
</template>
<script>

	export default{

		name:'ListadoEquipos',
		components:{

		},


		data() {
    return {

  		equipos:[],
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

        var url = 'http://127.0.0.1:8000/equipo?page='+page;
        axios.get(url).then(res=>{
        this.equipos=res.data.equipo.data;
        this.paginate = res.data.paginate;
  })

    },

    editar(equipo, page){


    },

    eliminar(equipo, page){



    },

    detalles(equipo, page){


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