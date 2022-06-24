<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" class="form-control" v-model="producto.sku">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="producto.nombre">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Categoría</label>
                                    <select class="form-control" v-model="producto.id_categoria">
                                        <option value="" selected>Selecciona categoria</option>
                                        <option v-for="categoria in categorias" :value="categoria.id">{{categoria.categoria}}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <textarea class="form-control" v-model="producto.descripcion"
                                              style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" v-model="producto.precio">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input type="text" class="form-control" v-model="producto.cantidad">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>¿Cuenta con inventario?</label>
                                    <select class="form-control" v-model="producto.estado">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "crear-producto",
        data() {
            return {
                producto: {
                    sku: "",
                    nombre: "",
                    id_categoria: "",
                    descripcion: "",
                    precio: "",
                    cantidad: "",
                    estado: ""
                },
                categorias: []
            }
        },
        mounted(){
            this.getCategorias()
        },
        methods: {
            async crear() {
                await this.axios.post('api/productos', this.producto).then(response => {
                    this.$router.push({name: "mostrarProducto"})
                }).catch(error => {
                    console.log(error)
                })
            },
            async getCategorias(){
                await this.axios.get('/api/productos/create').then(response=>{
                    this.categorias = response.data
                }).catch(error=>{
                    console.log(error)
                    this.categorias = []
                })
            }


        }



    }
</script>