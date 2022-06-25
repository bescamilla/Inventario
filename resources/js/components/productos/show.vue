<template>
    <div class="row">
        <div class="col-12 mb-2">
        </div>

        <div class="row">
            <div class="col-2">
                <div class="row">
                    <img src="https://m.media-amazon.com/images/I/71luYyAPVTL._AC_SL1500_.jpg" style="height: 150px">
                </div>
            </div>
            <div class="col-10">

                <div class="row">{{producto.nombre}}</div>
                <div class="row">{{producto.categoria}}</div>

                <div class="row">${{producto.precio}} -
                    <div class="col-1"  v-for="n in producto.evaluacion">
                        <i class="fa fa-star checked"></i>
                    </div>
                    <div class="col-1" v-for="w in producto.ratio">
                        <i class="fa fa-star" ></i>
                    </div>
                </div>

                <div class="row" v-if="producto.estado == 'Si'">
                    Disponible - Con stock
                </div>
                <div class="row" v-else-if="producto.estado == 'No'">No disponible - Sin stock</div>
                <div class="row">{{producto.descripcion}}</div>
                <div class="row">
                    <router-link :to='{name:"calificarProducto",params:{id:producto.id}}' class="btn btn-success"><i class="fas fa-heart"></i> Calificar</router-link>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "show-producto",
        data() {
            return {
                producto: {
                    id: "",
                    sku: "",
                    nombre: "",
                    categoria: "",
                    descripcion: "",
                    precio: "",
                    cantidad: "",
                    estado: "",
                    evaluacion: 0,
                    ratio: 0
                }
            }
        },
        mounted() {
            this.mostrarProductos();
        },
        methods: {
            async mostrarProductos() {
                await this.axios.get(`/api/productos/${this.$route.params.id}/edit`).then(response => {
                    const {sku, nombre, id, descripcion, precio, cantidad, estado, evaluacion, categorias} = response.data;
                    this.producto.id = id;
                    this.producto.sku = sku;
                    this.producto.nombre = nombre;
                    this.producto.descripcion = descripcion;
                    this.producto.precio = precio;
                    this.producto.cantidad = cantidad;
                    this.producto.estado = estado;
                    this.producto.evaluacion = parseInt(evaluacion);
                    this.producto.ratio = 5 - parseInt(evaluacion);
                    this.producto.categoria = categorias ;

                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>