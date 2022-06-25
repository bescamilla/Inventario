<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Calificar Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="inventario">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>¿Cuenta con inventario?</label>
                                        <select class="form-control" v-model="producto.estado">
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
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
        name: "inventario-producto",
        data() {
            return {
                producto: {
                    estado: ""
                }
            }
        },
        methods: {
            async inventario() {
                await this.axios.put(`/api/productos/${this.$route.params.id}`, this.producto).then(response => {
                    this.$router.push({name: "mostrarProducto"})
                }).catch(error => {
                    console.log(error)
                })
            }


        }


    }

</script>