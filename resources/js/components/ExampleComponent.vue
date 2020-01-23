<template>
    <div class="container">

                                      <form class="form-horizontal" @submit.prevent="registrar">
                                         <fieldset>
                                             <legend class="text-center header">registra el equipo averiado</legend>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>nombre</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="nombre" v-model="datos.nombre" name="nombre" type="text" placeholder="nombre del equipo averiado" class="form-control rounded-pill">
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>modelo</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="modelo" v-model="datos.modelo" name="modelo" type="text" placeholder="modelo del equipo" class="form-control rounded-pill">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>marca</label>    </span>
                                                <div class="col justify-content-center">
                                                    <input id="marca" v-model="datos.marca" name="marca" type="text" placeholder="marca del equipo" class="form-control rounded-pill">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>codigo</label></span>
                                                <div class="col justify-content-center">
                                                    <input id="codigo" v-model="datos.codigo" name="codigo" type="text" placeholder="codigo del equipo" class="form-control rounded-pill">
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>departamento</label></span>
                                                <div class="col justify-content-center">
                                                    <select  id="categoria"
                                                     v-model="datos.departamento"
                                                      class="form-control rounded-pill">
                                                         <option v-for="departamento of departamentos" :key="departamento.id" :value="departamento.id"> {{
                                                         departamento.departamento }}</option>
                                                    </select>
                                                 </div>
                                            </div>


                                             <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>categoria</label></span>
                                                <div class="col justify-content-center">
                                                    <select  id="categoria"
                                                     v-model="datos.categoria"
                                                     name="categoria"
                                                      class="form-control rounded-pill">
                                                         <option v-for="valor of valores" :key="valor.id" :value="valor.id"> {{
                                                         valor.categoria }}</option>
                                                    </select>
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <span class="col-md-1 col-md-offset-2 text-center"><label>descripcion</label></span>
                                                <div class="col justify-content-center">
                                                    <textarea class="form-control " v-model="datos.descripcion" id="descripcion" name="descripcion" placeholder="descripcion del equipo averiado" rows="7"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">registrar</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                     </form>
                                </div>

</template>

<script>
import Swal from 'sweetalert2'
    export default {
        name:'ExampleComponent',
        data(){
            return{

                valores:[],
                departamentos:[],
                datos:[{
                'nombre':'',
                'modelo':'',
                'marca':'',
                'codigo':'',
                'descripcion':'',
                'categoria': '',
                'departamento':'',
                }],

                button: 'agrega una nueva categoria',

                errors:[],

            }
        },


        mounted(){

            this.listar();
            this.depa();
        },


        methods:{

            listar(){

                  axios.get('categoria')
                .then((response) => {
                this.valores = response.data;
                })
            },

              depa(){

                axios.get('select')
                .then((response) => {
                this.departamentos = response.data.depa;

             })

            },

            registrar(){
                const data = {
                    'nombre': this.datos.nombre,
                    'modelo': this.datos.modelo,
                    'marca': this.datos.marca,
                    'codigo': this.datos.codigo,
                    'descripcion': this.datos.descripcion,
                    'categoria': this.datos.categoria,
                    'departamento': this.datos.departamento
                };

            axios.post('equipo', data)
                 .then((response) => {

                    this.datos.nombre = '';
                    this.datos.modelo = '';
                    this.datos.marca = '';
                    this.datos.codigo = '';
                    this.datos.descripcion = '';
                    this.datos.categoria  = '';
                    this.datos.departamento = '';

                 Swal.fire({
                position: 'center',
                 icon: 'success',
                title: 'equipo registrado con exito',
                showConfirmButton: false,
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
        }
    }
</script>
