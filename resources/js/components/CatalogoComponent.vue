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
                        <h6 class="h2 text-white d-inline-block mb-0">Carrito</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Carrito</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-primary" @click="fnMostrarCarrito(libro)">
                            <span><i class="ni ni-cart"></i> Carrito</span>
                            <span class="badge badge-white">{{lista_carrito.length}}</span>
                        </button>
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
                    <th scope="col">Libro</th>
                    <th scope="col">Año</th>
                    <th scope="col">Paginas</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Precio</th>
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
                    {{libro.anio}}
                </td>
                <td class="budget">
                    {{libro.no_pagina}}
                </td>
                <td class="budget">
                    {{libro.nombre}}
                </td>
                <td class="budget">
                    {{libro.nombre_au}}
                </td>
                <td class="budget">
                    {{libro.nombre_edi}}
                </td>
                <td class="budget">
                    {{libro.precio}}
                </td>
            <td class="text-right">
                <div class="dropdown">
                    <button type="button" class="btn btn-outline-primary" @click="fnAgregarLibro(libro)">
                        <i class="ni ni-basket"> Agregar</i>
                    </button>     
                </div>
            </td>
            </tr>
        </table>
        </div>
        
        <!-- Modal  Nuevo libro-->
        <div class="modal fade" id="modalNuevoLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form nuevo libro-->
                 <div class="table-responsive">
            <table class="table align-items-center table-dark">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Libro</th>
                    <th scope="col">Año</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tr v-for="libro in lista_carrito" :key="libro.id"> 
                <th>
                    <div class="media align items-center">
                        <div class="media-body">
                            <img :src="'/storage/'+ libro.url_imagen" width="50px"/>
                        </div>
                    </div>
                </th>
                <td class="budget">
                    {{libro.anio}}
                </td>
                
                <td class="budget">
                    {{libro.nombre}}
                </td>
                <td class="budget">
                    {{libro.precio}}
                </td>
                <td class="budget">
                    {{libro.cantidad}}
                </td>
                <td class="budget">
                   <button type="button" class="btn btn-outline-danger" @click="fnEliminarLibroCarrito(libro)">X</button>        
            </td>
            </tr>
        </table>

        </div>
            </div>
            <div class="modal-footer">
                <span aria-hidden="true">Total: ${{total}}</span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" @click="fnMostrarVenta()"><i class="ni ni-money-coins"> Comprar Carrito</i></button>
            </div>
            </div>
        </div>
        </div>
         <!-- Modal  Detalle Venta-->
        <div class="modal fade" id="modalDetalleVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de la Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form nuevo libro-->
                <form>                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Identificador Venta</label>
                            <input type="text" class="form-control"  placeholder="1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Libro</label>   
                            <input type="text" class="form-control" v-model="idLibro">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Cantidad de Libro</label>   
                            <input type="text" class="form-control" v-model="cantidad" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Total de Venta</label>
                            <input type="text" class="form-control" v-model="total" readonly>
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
                <button type="button" class="btn btn-primary" @click="guardarDetalleVenta()">Pagar</button>
            </div>
            </div>
        </div>
        </div>
         <!-- Modal  Nuevo Venta-->
        <div class="modal fade" id="modalNuevaVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Form nuevo libro-->
                <form>                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            
                            <input type="hidden" class="form-control"  v-model="nuevaVenta.fecha">
                            <input type="hidden" class="form-control" v-model="nuevaVenta.idUsu">
                            <input type="hidden" class="form-control" v-model="nuevaVenta.no_doc">
                            <input type="hidden" class="form-control" v-model="nuevaVenta.estado">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="alert alert-secondary" role="alert">
                                <strong>Generando Venta!</strong> Su venta se esta generando presione continuar para seguircon el procedimiento !
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
                <button type="button" class="btn btn-primary" @click="guardar()">Continuar</button>
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
        this.listar_libros(),
        this.listar_ventas()
    },
    data(){
        return{
            nuevoLibro: {},
            errores:'',
            lista_carrito:[],
            lista_libros: {},
            lista_categorias:{},
            lista_editorial:{},
            lista_autor:{},
            eliminar_libro:{},
            eliminar_Carritolibro:{},
            imagen_Libro:'',
            

            nuevaDetalleVenta:{},

            nuevaVenta:{},
            lista_venta:{},


        }
    },
    computed: {
        total: function(){
            let suma = 0;
            this.lista_carrito.forEach((libroX, index) => {       
            suma=suma+(this.lista_carrito[index].cantidad * this.lista_carrito[index].precio);

            });
            return suma
        },
        
        cantidad: function(){
            let sumaCantidad = 0;
            this.lista_carrito.forEach((libroX, index) => {       
            sumaCantidad=sumaCantidad+(this.lista_carrito[index].cantidad);

            });
            return sumaCantidad
        },
          idLibro: function(){
            let idLibroU = 0;
            this.lista_carrito.forEach((libroX, index) => {   
            idLibroU=(this.lista_carrito[index].id);  

            });
            return idLibroU
        }
    },
    methods:{
        obtenerImagen(e){

           this.imagen_Libro= e.target.files[0]

        },
        fnMostrarVenta(){
            this.nuevaVenta={};
            $('#modalNuevaVenta').modal('toggle');

        },
        fnMostrarDetalleVenta(){
            
            this.nuevaDetalleVenta={};
            $('#modalDetalleVenta').modal('toggle');

        },


        fnNuevoLibro(){
            this.listar_categorias();
            this.listar_editorial();
            this.listar_autor();
            $('#modalNuevoLibro').modal('toggle');
            this.nuevoLibro={};
        },
         fnAgregarLibro(libro){
            alert("Se agrego un libro");
            
            if (this.lista_carrito.length > 0) {
                var existeLibro = 0;
                this.lista_carrito.forEach((libroX, index) => {
                     
                     if (libro.id == libroX.id) {
                         existeLibro = 1;
                        this.lista_carrito[index].cantidad = this.lista_carrito[index].cantidad + 1;

                    }

                });

                if (existeLibro === 0) {
                        this.lista_carrito.push(libro);
                    }
                    
            } else {
                this.lista_carrito.push(libro);
            }

           
                        

        },

         fnMostrarCarrito(libro){
            this.nuevoLibro=libro;
            this.listar_autor();
            this.listar_editorial();
            $('#modalNuevoLibro').modal('toggle');
        },
        async fnEliminarLibroCarrito(libro){
           if (this.lista_carrito.length > 0) {

                var existeLibro = 0;
                this.lista_carrito.forEach((libroX, index) => {
                     
                     if (libro.id == libroX.id) {
                         existeLibro = 1;
                        this.lista_carrito[index].cantidad = this.lista_carrito[index].cantidad - 1;
                    }if(libroX.cantidad <= 0){
                        alert("Ya no cuenta con este articulo en su carrito!");
                        this.lista_carrito.splice(index,1);
                    }

                });
           }

                 
        },
        async listar_libros(){
            await axios.get("api/libros")
                .then((respuesta)=>{

                        console.log(respuesta.data)
                        this.lista_libros = [];

                        respuesta.data.forEach((libroX, index) => {
                            libroX.cantidad = 1;
                            this.lista_libros.push(libroX);
                        });
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
        async listar_ventas(){
            await axios.get("api/Cventa")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_venta=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },
         async guardar(){
             $('#modalDetalleVenta').modal('toggle');
            const datos_venta =new FormData
             
            if(!this.nuevaVenta.id){
                datos_venta.set('id',0)

            }else{
                datos_venta.set('id',this.nuevaVenta.id);
            }

            datos_venta.set('fecha',this.nuevaVenta.fecha);
            datos_venta.set('idUsu',this.nuevaVenta.idUsu);
            datos_venta.set('no_doc',this.nuevaVenta.no_doc);
            datos_venta.set('estado',this.nuevaVenta.estado);
            
            

            await axios.post("api/guardar_Cventa",datos_venta)
                .then((respuesta)=>{
                        console.log(respuesta)
                       
                        this.nuevaVenta={}
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
        },
         async guardarDetalleVenta(){
            const datos_dtventa =new FormData

            if(!this.nuevaDetalleVenta.id){
                datos_dtventa.set('id',0)

            }else{
                datos_dtventa.set('id',this.nuevaDetalleVenta.id);
            }

            datos_dtventa.set('idLibro',this.idLibro);
            datos_dtventa.set('cantidad',this.cantidad);
            datos_dtventa.set('total',this.total);
            
            

            await axios.post("api/guardar_Dtventa",datos_dtventa)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalDetalleVenta').modal('toggle');
                        this.nuevaDetalleVenta={}
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