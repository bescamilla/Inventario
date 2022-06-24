<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- llamamos al logo de Vue -->
                    <img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fmedia-exp1.licdn.com%2Fdms%2Fimage%2FC560BAQEEBIF-06UXJg%2Fcompany-logo_200_200%2F0%2F1569260297331%3Fe%3D2147483647%26v%3Dbeta%26t%3DCVdhhjaHufDMDv040K1nIPsBW9WbFGURuTuv1UxWsX0&imgrefurl=https%3A%2F%2Fmx.linkedin.com%2Fcompany%2Fdropstudious&tbnid=5n3YfS_jjeSdBM&vet=12ahUKEwjcqsX7mMf4AhWFlGoFHTACCzgQMygAegQIARBo..i&docid=t4ig9A5HgIeYvM&w=200&h=200&q=dropstudio&ved=2ahUKEwjcqsX7mMf4AhWFlGoFHTACCzgQMygAegQIARBo">
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