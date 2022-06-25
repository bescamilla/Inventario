<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearProducto"}' class="btn btn-success"><i class="fas fa-plus-circle"></i> Agregar
                producto
            </router-link>
        </div>

        <div class="row" v-for="producto in productos" :key="producto.id">
            <div class="col-2">
                <div class="row">
                    <img src="https://m.media-amazon.com/images/I/71luYyAPVTL._AC_SL1500_.jpg"
                         style="height: 150px">
                </div>
            </div>
            <div class="col-8">


                <div class="row"><h4>{{producto.nombre}}</h4></div>
                <div class="row"><b>Descripción:</b>
                    <p>{{producto.descripcion}}</p>
                </div>
                <div class="row">
                    <div class="col-3">
                        <b>SKU:</b> {{producto.sku}}
                    </div>
                    <div class="col-9">
                        <b>Categoría:</b> {{producto.categoria.categoria}}
                    </div>

                </div>
                <div class="row">
                    <div class="col-1" v-for="n in 5">
                        <i class="fa fa-star checked" v-if="n <= producto.evaluacion"></i>
                        <i class="fa fa-star" v-else></i>
                    </div>
                </div>

                <div class="row" style="color: green" v-if="producto.estado == 'Si'"> <p>Con stock - {{producto.cantidad}} unidades</p></div>
                <div class="row" style="color: red" v-else-if="producto.estado == 'No'"><p>Sin stock</p></div>
            </div>
            <div class="col-2" style="border-left: 1px solid #cbcbcb !important;">
                <div class="row">
                    <h4 style="color: mediumpurple">${{producto.precio}}</h4>
                </div>

                <div class="row" style="color: green" v-if="producto.estado == 'Si'">Disponible</div>
                <div class="row" style="color: red" v-else-if="producto.estado == 'No'">No disponible</div>

                <div class="row">
                    <router-link :to='{name:"showProducto",params:{id:producto.id}}' class="btn btn-info"><i
                            class="fas fa-eye"></i> Mostrar
                    </router-link>
                </div>
                <div class="row">
                    <router-link :to='{name:"editarProducto",params:{id:producto.id}}' class="btn btn-success"><i
                            class="fas fa-edit"></i> Editar
                    </router-link>
                </div>
                <div class="row">
                    <router-link :to='{name:"inventarioProducto",params:{id:producto.id}}' class="btn btn-success"><i
                            class="fas fa-warehouse"></i> Inventario
                    </router-link>
                </div>
                <div class="row"><a type="button" @click="borrarProducto(producto.id)" class="btn btn-danger"><i
                        class="fas fa-trash"></i> Eliminar</a></div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "productos",
        data() {
            return {
                productos: []
            }
        },
        mounted() {
            this.mostrarProductos()
        },
        methods: {
            async mostrarProductos() {
                await this.axios.get('/api/productos').then(response => {

                    // for para sacar el promedio de las evaluaciones
                    for (var i = 0; i < response.data.length; i++) {
                        var suma = 0;
                        for (var j = 0; j < response.data[i].evaluaciones.length; j++) {
                            suma += response.data[i].evaluaciones[j].evaluacion;
                        }
                        var evalua = suma / response.data[i].evaluaciones.length;
                        if (evalua > 0) {
                            response.data[i].evaluacion = evalua;
                        } else {
                            response.data[i].evaluacion = 0;
                        }
                    }

                    this.productos = response.data;
                }).catch(error => {
                    console.log(error)
                    this.productos = []
                })
            },
            borrarProducto(id) {
                if (confirm("¿Confirma eliminar el producto?")) {
                    this.axios.delete(`/api/productos/${id}`).then(response => {
                        this.mostrarProductos()
                    }).catch(error => {
                        console.log(error)
                    })
                }
            }
        }
    }
</script>