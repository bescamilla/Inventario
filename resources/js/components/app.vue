<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- llamamos al logo de Vue -->
                    <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fseeklogo.com%2Fimages%2FL%2Flaravel-framework-logo-C10176EC8C-seeklogo.com.png&imgrefurl=https%3A%2F%2Fseeklogo.com%2Ffree-vector-logos%2Flaravel&tbnid=3baoEfw-6blhIM&vet=12ahUKEwiA-5j20cb4AhWSA80KHUZaCtQQMygCegUIARC9AQ..i&docid=VX95y8IUUCm_iM&w=300&h=260&q=laravel%20logo&ved=2ahUKEwiA-5j20cb4AhWSA80KHUZaCtQQMygCegUIARC9AQ" alt="" width="30" height="24">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">Inicio</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
    export default {}
</script>