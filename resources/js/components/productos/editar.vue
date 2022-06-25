<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
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
                                        <option v-for="categoria in categorias" :value="categoria.id">
                                            {{categoria.categoria}}
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
                                    <label>Imagen</label>
                                    <input type="file" accept="image/*" class="form-control" @change="selectFile">
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
        name: "editar-producto",
        data() {
            return {
                producto: {
                    sku: "",
                    nombre: "",
                    id_categoria: "",
                    descripcion: "",
                    precio: "",
                    cantidad: "",
                    estado: "",
                    imagen: null
                },
                categorias: []
            }
        },
        mounted() {
            this.mostrarProducto();
            this.getCategorias();
        },
        methods: {
            async mostrarProducto() {
                //metodo para obtener los productos
                await this.axios.get(`/api/productos/${this.$route.params.id}/edit`).then(response => {
                    const { sku, nombre, id_categoria, descripcion, precio, cantidad, estado } = response.data;
                    this.producto.sku = sku;
                    this.producto.nombre = nombre;
                    this.producto.id_categoria = id_categoria;
                    this.producto.descripcion = descripcion;
                    this.producto.precio = precio;
                    this.producto.cantidad = cantidad;
                    this.producto.estado = estado;
                }).catch(error => {
                    console.log(error)
                })
            },
            async actualizar() {

                // se crea formdata para subir imagenes
                let productos = new FormData();
                for(let key in this.producto){
                    productos.append(key, this.producto[key]);
                }

                await this.axios.post(`/api/productos/update/${this.$route.params.id}`, productos).then(response => {
                    this.$router.push({name: "mostrarProducto"})
                }).catch(error => {
                    console.log(error)
                })
            },
            async getCategorias() {
                // metodo para obtener categoria
                await this.axios.get('/api/productos/create').then(response => {
                    this.categorias = response.data
                }).catch(error => {
                    console.log(error)
                    this.categorias = []
                })
            },
            selectFile(event){
                // metodo para guardar la imagen en el array
                this.producto.imagen = event.target.files[0];
            }
        }
    }

</script>