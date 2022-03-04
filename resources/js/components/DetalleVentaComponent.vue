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
                        <h6 class="h2 text-white d-inline-block mb-0">Detalle de Ventas</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalle de Ventas</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" @click="listar_dtventas()" >Recargar</button>
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
                    <th scope="col">ID Venta</th>
                    <th scope="col">ID Libro</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tr v-for="dtventa in lista_Dtventa" :key="dtventa.id"> 
                <th>
                    <div class="media align items-center">
                        <div class="media-body">
                             {{dtventa.idVenta}}
                        </div>
                    </div>
                </th>
                <td class="budget">
                    {{dtventa.idLibro}}
                </td>
                <td class="budget">
                    {{dtventa.cantidad}}
                </td>
                <td class="budget">
                    {{dtventa.precio}}
                </td>
                <td class="budget">
                    {{dtventa.total}}
                </td>
            </tr>
        </table>

        </div>
    </div>
</template>

<script>
export default {
    setup() {
        
    },
    mounted(){
        listar_dtventas()
    },
    data(){
        return{
            nuevaDtVenta: {},
            errores:'',
            lista_Dtventa:{},
            eliminar_venta:{}


        }
    }
    ,methods:{
         async listar_dtventas(){
            await axios.get("api/dtventa")
                .then((respuesta)=>{
                        console.log(respuesta.data)
                        this.lista_Dtventa=respuesta.data     
                    }
                )
                .catch((error)=>{                        
                        console.log(error.response.data)                        
                    }
                )
        },

    
        
    },

    
}
</script>