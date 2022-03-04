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
                        <h6 class="h2 text-white d-inline-block mb-0">Ventas</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" @click="fnNuevaVenta()" id="nuevoAutor">Nuevo</button>
                        <button type="button" class="btn btn-sm btn-neutral" @click="listar_ventas()" >Recargar</button>
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
                    <th scope="col">Fecha</th>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Codigo de Venta</th>
                    <th scope="col">Estatus</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tr v-for="venta in lista_venta" :key="venta.id"> 
                <th>
                    <div class="media align items-center">
                        <div class="media-body">
                             {{venta.fecha}}
                        </div>
                    </div>
                </th>
                <td class="budget">
                    {{venta.idUsu}}
                </td>
                <td class="budget">
                    {{venta.no_doc}}
                </td>
                <td class="budget">
                    {{venta.estado}}
                </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <button class="dropdown-item" @click="fnEditarVenta(venta)">
                                <span class="btn-inner--icon"><i class="ni ni-collection"></i></span>
                                <span class="btn-inner--text">Editar</span>
                            </button>
                             <button class="dropdown-item" @click="fnMostrarEliminarVenta(venta)">
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
           <div class="modal fade" id="modalEliminarVenta" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Eliminar Venta</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                    <div class="modal-body">
                        
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Está seguro de querer eliminar esta Venta!</h4>
                            <p>Una vez realizada esta acción no se podrá deshacer.</p>
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" @click="fnEliminarVenta()">Eliminar</button>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cerrar</button> 
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Modal  Nuevo libro-->
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
                            <label>Fecha de Venta</label>
                            <input type="date" class="form-control"  v-model="nuevaVenta.fecha">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Usuario</label>   
                            <input type="text" class="form-control" v-model="nuevaVenta.idUsu"  placeholder="Ingrese el identificador del usuario">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Cogigó de Venta</label>   
                            <input type="text" class="form-control" v-model="nuevaVenta.no_doc"  placeholder="Ingrese un codigó de venta">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Estatus de Venta</label>   
                            <input type="text" class="form-control" v-model="nuevaVenta.estado"  placeholder="Ingrese un estatus">
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
        this.listar_ventas()
    },
    data(){
        return{
            nuevaVenta: {},
            errores:'',
            lista_venta:{},
            eliminar_venta:{}


        }
    }
    ,methods:{
        fnNuevaVenta(){
            $('#modalNuevaVenta').modal('toggle');
            this.nuevaVenta={};
        },

        fnEditarVenta(venta){
            this.nuevaVenta=venta;
            $('#modalNuevaVenta').modal('toggle');
        },
        fnMostrarEliminarVenta(venta){
            this.eliminar_venta=venta;
            $('#modalEliminarVenta').modal('toggle');

        },
        async fnEliminarVenta(venta){
            await axios.post("api/eliminar_venta",this.eliminar_venta)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalEliminarVenta').modal('toggle');
                        this.eliminar_venta={}
                        this.listar_ventas()
                    }
                )

                .catch((error)=>{
                        
                        console.log(error.response.data);
                    }
                )
        },
         async listar_ventas(){
            await axios.get("api/venta")
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
            
            

            await axios.post("api/guardar_venta",datos_venta)
                .then((respuesta)=>{
                        console.log(respuesta)
                        $('#modalNuevaVenta').modal('toggle');
                        this.nuevaVenta={}
                        this.errores=""
                        this.listar_ventas()
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