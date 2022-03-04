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
                        <h6 class="h2 text-white d-inline-block mb-0">Libros</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Libros</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" @click="fnNuevoLibro()" id="nuevoLibro">Nuevo</button>
                        <button type="button" class="btn btn-sm btn-neutral" @click="listar_libros()" >Recargar</button>
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
                    <th scope="col">ISBN</th>
                    <th scope="col">Año</th>
                    <th scope="col">Paginas</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Formato</th>
                    <th scope="col">Existencia</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tr v-for="libro in lista_libros" :key="libro.id"> 
                <th>
                    <div class="media align items-center">
                        <div class="media-body">
                            <img :src="'/storage/'+ libro.url_imagen" width="120px"/>
                        </div>
                    </div>
                </th>
                <td class="budget">
                    {{libro.ibsn}}
                </td>
                <td class="budget">
                    {{libro.anio}}
                </td>
                <td class="budget">
                    {{libro.no_pagina}}
                </td>
                <td class="budget">
                    {{libro.nombre}}
                </td>
                <td class="budget">
                    {{libro.descripcion}}
                </td>
                <td class="budget">
                    {{libro.nombre_au}}
                </td>
                <td class="budget">
                    {{libro.nombre_cat}}
                </td>
                <td class="budget">
                    {{libro.nombre_edi}}
                </td>
                <td class="budget">
                    {{libro.precio}}
                </td>
                <td class="budget">
                    {{libro.formato}}
                </td>
                 <td class="budget">
                    {{libro.existencia}}
                </td>
            
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <button class="dropdown-item" @click="fnEditarLibro(libro)">
                                <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                                <span class="btn-inner--text">Editar</span>
                            </button>
                             <button class="dropdown-item" @click="fnMostrarEliminarLibro(libro)">
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
           <div class="modal fade" id="modalEliminarLibro" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Eliminar Libro</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Está seguro de querer eliminar este libro!</h4>
                            <p> Con el ISBN: {{eliminar_libro.ibsn}}</p>
                            <p>Una vez realizada esta acción no se podrá deshacer.</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" @click="fnEliminarLibro()">Eliminar</button>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button> 
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Modal  Nuevo libro-->
        <div class="modal fade" id="modalNuevoLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form nuevo libro-->
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <img :src="'/storage/'+ nuevoLibro.url_imagen" width="120px"/>
                         </div>
                         <div class="col-md-6">
                            <input type="file" @change="obtenerImagen">
                            
                         </div>      
                    </div>
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>ISBN del Libro</label>
                            <input type="text" class="form-control"  v-model="nuevoLibro.ibsn" placeholder="ISBN del Libro">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nombre del Libro</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.nombre"  placeholder="Nombre del Libro">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Año del Libro</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.anio"  placeholder="Ejem. 2021">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Numero de Paginas</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.no_pagina"  placeholder="Ejem. 420">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Descripción del Libro</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.descripcion"  placeholder="Descripción del Libro">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Autor</label>
                            <select class="form-control" v-model="nuevoLibro.idAutor">
                                 <option v-for="autor in lista_autor" :key="autor.id" v-bind:value="autor.id">
                                    {{autor.nombre}}
                                </option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Categoria</label>   
                            <select class="form-control" v-model="nuevoLibro.idCategoria">
                                <option v-for="categoria in lista_categorias" :key="categoria.id" v-bind:value="categoria.id">
                                    {{categoria.nombre}}
                                </option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Editorial</label>   
                                <select class="form-control" v-model="nuevoLibro.idEditorial">
                                <option v-for="editorial in lista_editorial" :key="editorial.id" v-bind:value="editorial.id">
                                    {{editorial.nombre}}
                                </option>
                            </select>                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Precio del Libro</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.precio"  placeholder="Ejem. $540.20">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Formato del Libro</label>   
                            <!--<input type="text" class="form-control" v-model="nuevoLibro.formato"  placeholder="Ejem. Físico">-->
                            <select class="form-control" v-model="nuevoLibro.formato">
                                <option>
                                    Fisico
                                </option>
                                <option>
                                    PDF
                                </option>
                            </select>     
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Existencia del Libro</label>   
                            <input type="text" class="form-control" v-model="nuevoLibro.existencia"  placeholder="Ejem. 50">
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
        this.listar_libros()
    },
    data(){
        return{
            nuevoLibro: {},
            errores:'',
            lista_libros: {},
            lista_categorias:{},
            lista_editorial:{},
            lista_autor:{},
            eliminar_libro:{},
            imagen_Libro:''


        }
    }
    ,methods:{
        obtenerImagen(e){

           this.imagen_Libro= e.target.files[0]

        },

        fnNuevoLibro(){
            this.listar_categorias();
            this.listar_editorial();
            this.listar_autor();
            $('#modalNuevoLibro').modal('toggle');
            this.nuevoLibro={};
        },

        fnEditarLibro(libro){
            this.nuevoLibro=libro;
            this.listar_categorias();
            this.listar_editorial();
            this.listar_autor();
            $('#modalNuevoLibro').modal('toggle');
        },
        fnMostrarEliminarLibro(libro){
            this.eliminar_libro=libro;
            $('#modalEliminarLibro').modal('toggle');

        },
        async fnEliminarLibro(libro){
            await axios.post("api/elimina_libro",this.eliminar_libro)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalEliminarLibro').modal('toggle');
                        this.eliminar_libro={}
                        this.listar_libros()
                    }
                )

                .catch((error)=>{
                        
                        console.log(error.response.data);
                    }
                )
        },
        async listar_libros(){
            await axios.get("api/libros")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_libros=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },
         async listar_categorias(){
            await axios.get("api/categorias")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_categorias=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },
         async listar_editorial(){
            await axios.get("api/editorial")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_editorial=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },
         async listar_autor(){
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
            const datos_libro =new FormData

            if(!this.nuevoLibro.id){
                datos_libro.set('id',0)
               
            }else{
                datos_libro.set('id',this.nuevoLibro.id);
            }

            datos_libro.set('ibsn',this.nuevoLibro.ibsn);
            datos_libro.set('anio',this.nuevoLibro.anio);
            datos_libro.set('no_pagina',this.nuevoLibro.no_pagina);
            datos_libro.set('nombre',this.nuevoLibro.nombre);
            datos_libro.set('descripcion',this.nuevoLibro.descripcion);
            datos_libro.set('idAutor',this.nuevoLibro.idAutor);
            datos_libro.set('idCategoria',this.nuevoLibro.idCategoria);
            datos_libro.set('idEditorial',this.nuevoLibro.idEditorial);
            datos_libro.set('url_imagen',this.imagen_Libro);
            datos_libro.set('precio',this.nuevoLibro.precio);
            datos_libro.set('formato',this.nuevoLibro.formato);
            datos_libro.set('existencia',this.nuevoLibro.existencia);

            await axios.post("api/guardar_libro",datos_libro)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalNuevoLibro').modal('toggle');
                        this.nuevoLibro={}
                        this.errores=""
                        this.listar_libros()
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