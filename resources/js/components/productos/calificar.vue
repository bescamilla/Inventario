<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Calificar Producto</h4></div>
                <div class="card-body">
                    <form @submit.prevent="calificar">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <div class="rating">
                                        <input type="radio" name="evaluacion" value="5" id="5" v-model="calificacion.evaluacion">
                                        <label for="5">☆</label>
                                        <input type="radio" name="evaluacion" value="4" id="4" v-model="calificacion.evaluacion">
                                        <label for="4">☆</label>
                                        <input type="radio" name="evaluacion" value="3" id="3" v-model="calificacion.evaluacion">
                                        <label for="3">☆</label>
                                        <input type="radio" name="evaluacion" value="2" id="2" v-model="calificacion.evaluacion">
                                        <label for="2">☆</label>
                                        <input type="radio" name="evaluacion" value="1" id="1" v-model="calificacion.evaluacion">
                                        <label for="1">☆</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Calificar</button>
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
        name: "calificar-producto",
        data() {
            return {
                calificacion: {
                    evaluacion: ""
                }
            }
        },
        methods: {
            async calificar() {
                await this.axios.put(`/api/productos/calificar/${this.$route.params.id}`, this.calificacion).then(response => {
                    this.$router.push({name: "mostrarProducto"})
                }).catch(error => {
                    console.log(error)
                })
            }


        }


    }

</script>