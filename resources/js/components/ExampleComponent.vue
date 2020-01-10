<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-4">
                        <button @click="agregacategoria" class="btn btn-primary "> {{ this.button }} </button>
                        <div class="container p-3" v-if="mostrar === true">
                            <form class="form-horizontal"  @submit.prevent="registrarcategoria">
                                <h5 class="text-center"> registra una nueva categoria</h5>
                               <div class="form-group p-3">
                                    <label> nombre de la categoria:</label>
                                    <input type="text" v-model="categoria.categoria" class="form-control" placeholder=" nombre de la categoria">
                                 </div>
                                 <div class="form-group p-3">
                                    <label> deja una breve descripcion de la categoria:</label>
                                    <input type="text" v-model="categoria.descripcion" class="form-control" placeholder="breve descripcion" >
                                </div>
                                <div class="container text-center">
                                    <button type="submit" class="btn btn-primary"> agregar </button>
                                </div>
                            </form>
                        </div>

                     </div>

                    <div class="container">
                         <div class="row">
                              <div class="col-md-12">
                                 <div class="well well-sm">
                                      <form class="form-horizontal" @submit.prevent="registrar">
                                         <fieldset>
                                             <legend class="text-center header">registra el equipo averiado</legend>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>nombre</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="nombre" v-model="datos.nombre" name="nombre" type="text" placeholder="nombre del equipo averiado" class="form-control">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>modelo</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="modelo" v-model="datos.modelo" name="modelo" type="text" placeholder="modelo del equipo" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>marca</label>    </span>
                                                <div class="col justify-content-center">
                                                    <input id="marca" v-model="datos.marca" name="marca" type="text" placeholder="marca del equipo" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>codigo</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="codigo" v-model="datos.codigo" name="codigo" type="text" placeholder="codigo del equipo" class="form-control">
                                                 </div>
                                            </div>

                                             <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>categoria</label></span>
                                                <div class="col justify-content-center">
                                                    <select  id="categoria"
                                                     v-model="datos.categoria"
                                                     name="categoria"
                                                      class="form-control">
                                                         <option v-for="(valor , index) of valores" :key="valor.id" :value="index"> {{
                                                         valor.categoria }}</option>
                                                    </select>
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>descripcion</label></span>
                                                <div class="col justify-content-center">
                                                    <textarea class="form-control" v-model="datos.descripcion" id="descripcion" name="descripcion" placeholder="descripcion del equipo averiado" rows="7"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg">registrar</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                     </form>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Swal from 'sweetalert2'
    export default {
        mounted() {

            axios.get('http://127.0.0.1:8000/categoria')
             .then((response) => {
             const valores = response.data;
                console.log(valores)
             })
        },
        data(){
            return{

                valores:[],
                datos:[{

                'nombre':'',
                'modelo':'',
                'marca':'',
                'codigo':'',
                'descripcion':'',
                'categoria': '',

                }],

                categoria:[{
                    'categoria':'',
                    'descripcion':''
                }],
                mostrar: false,
                button: 'agrega una nueva categoria',
            }
        },
        methods:{
            registrar(){

                const data = {

                    'nombre': this.datos.nombre,
                    'modelo': this.datos.modelo,
                    'marca': this.datos.marca,
                    'codigo': this.datos.codigo,
                    'descripcion': this.datos.descripcion,
                    'categoria': this.datos.categoria,

                };

            axios.post('http://127.0.0.1:8000/equipo', data)
                 .then((response) => {

                    this.datos.nombre = '';
                    this.datos.modelo = '';
                    this.datos.marca = '';
                    this.datos.codigo = '';
                    this.datos.descripcion = '';
                    this.datos.categoria  = '';

                 Swal.fire({
                position: 'top-end',
                 icon: 'success',
                title: 'equipo registrado con exito',
                showConfirmButton: true,

                        })

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
                 })

            },
            agregacategoria(){
                if (this.mostrar === true) {
                    this.mostrar = false;
                    this.button= 'agrega una nueva categoria';

                }else{
                    this.mostrar = true;
                    this.button = 'ocultar';
                }
            },
            registrarcategoria(){

                const cat = {
                    'categoria': this.categoria.categoria,
                    'descripcion' : this.categoria.descripcion
                };

                axios.post('http://127.0.0.1:8000/categoria', cat)
                 .then((response) => {
                    this.categoria.categoria = '';
                 this.categoria.descripcion = '';


                 Swal.fire({
                position: 'top-end',
                 icon: 'success',
                title: 'la categoria se ah añadido con exito',
                showConfirmButton: true,

                        })

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
                 })


            }
        }
    }
</script>
