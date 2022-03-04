<template>
    <div>
       <!-- Header -->
        <div class="header bg-gradient-primary pt-5 pt-md-6">
            <div class="container-fluid">

                <div class="header  pb-6">
                <div class="container-fluid">
                    <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Autores</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Autores</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" @click="fnNuevoAutor()" id="nuevoAutor">Nuevo</button>
                        <button type="button" class="btn btn-sm btn-neutral" @click="listar_autores()" >Recargar</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
        <!-- Header -->
        <div class="table-responsive">
            <table class="table align-items-center table-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tr v-for="autor in lista_autor" :key="autor.id"> 
                <th>
                    <div class="media align items-center">
                        <div class="media-body">
                            <img :src="'/storage/'+ autor.url_img" width="120px"/>
                        </div>
                    </div>
                </th>
                <td class="budget">
                    {{autor.nombre}}
                </td>
                <td class="budget">
                    {{autor.appPaterno}}
                </td>
                <td class="budget">
                    {{autor.appMaterno}}
                </td>
                <td class="budget">
                    {{autor.fechaNacimiento}}
                </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <button class="dropdown-item" @click="fnEditarAutor(autor)">
                                <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                                <span class="btn-inner--text">Editar</span>
                            </button>
                             <button class="dropdown-item" @click="fnMostrarEliminarAutor(autor)">
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="btn-inner--text">Eliminar</span>
                            </button>
                        </div>
                </div>
            </td>
            </tr>
        </table>

        </div>
        <!-- Modal  Eliminar libro-->
           <div class="modal fade" id="modalEliminarAutor" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Eliminar Autor</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Está seguro de querer eliminar este Autor!</h4>
                            <p>Una vez realizada esta acción no se podrá deshacer.</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" @click="fnEliminarAutor()">Eliminar</button>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button> 
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Modal  Nuevo libro-->
        <div class="modal fade" id="modalNuevoAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Autor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form nuevo libro-->
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <img :src="'/storage/'+ nuevoAutor.url_img" width="120px"/>
                         </div>
                         <div class="col-md-6">
                            <input type="file" @change="obtenerImagen">
                            
                         </div>      
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control"  v-model="nuevoAutor.nombre" placeholder="Nombre de Autor">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Apellido Paterno</label>   
                            <input type="text" class="form-control" v-model="nuevoAutor.appPaterno"  placeholder="Apellido Paterno">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Apellido Materno</label>   
                            <input type="text" class="form-control" v-model="nuevoAutor.appMaterno"  placeholder="Apellido Materno">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Fecha de Nacimiento</label>   
                            <input type="date" class="form-control" v-model="nuevoAutor.fechaNacimiento">
                            </div>
                        </div>
                        <div class="col-md-12" v-if="errores">
                            <div class="alert alert-warning" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text"><strong>Warning!</strong> {{errores}}</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="guardar()">Guardar</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    setup() {
        
    },
    mounted(){
        this.listar_autores()
    },
    data(){
        return{
            nuevoAutor: {},
            errores:'',
            lista_autor:{},
            eliminar_autor:{},
            imagen_Autor:''


        }
    }
    ,methods:{
        obtenerImagen(e){

           this.imagen_Autor= e.target.files[0]

        },

        fnNuevoAutor(){
            $('#modalNuevoAutor').modal('toggle');
            this.nuevoAutor={};
        },

        fnEditarAutor(autor){
            this.nuevoAutor=autor;
            $('#modalNuevoAutor').modal('toggle');
        },
        fnMostrarEliminarAutor(autor){
            this.eliminar_autor=autor;
            $('#modalEliminarAutor').modal('toggle');

        },
        async fnEliminarAutor(autor){
            await axios.post("api/elimina_autor",this.eliminar_autor)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalEliminarAutor').modal('toggle');
                        this.eliminar_autor={}
                        this.listar_autores()
                    }
                )

                .catch((error)=>{
                        
                        console.log(error.response.data);
                    }
                )
        },
         async listar_autores(){
            await axios.get("api/autor")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_autor=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },


        async guardar(){
            const datos_autor =new FormData

            if(!this.nuevoAutor.id){
                datos_autor.set('id',0)

            }else{
                datos_autor.set('id',this.nuevoAutor.id);
            }

            datos_autor.set('nombre',this.nuevoAutor.nombre);
            datos_autor.set('appPaterno',this.nuevoAutor.appPaterno);
            datos_autor.set('appMaterno',this.nuevoAutor.appMaterno);
            datos_autor.set('fechaNacimiento',this.nuevoAutor.fechaNacimiento);
            datos_autor.set('url_img',this.imagen_Autor);
            

            await axios.post("api/guardar_autor",datos_autor)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalNuevoAutor').modal('toggle');
                        this.nuevoAutor={}
                        this.errores=""
                        this.listar_autores()
                    }
                )

                .catch((error)=>{
                        
                        console.log(error.response.data)

                        if(error.response.data.errors != null){
                            var llaves= Object.keys(error.response.data.errors)

                            this.errores=error.response.data.errors[llaves[0]][0]
                        }else{
                            this.errores=error.message
                        }

                        
                    }
                )
        }
    
        
    },

    
}
</script>