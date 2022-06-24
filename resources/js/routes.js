//importamos los componentes

const Crear = () => import('./components/productos/crear.vue');
const Editar = () => import('./components/productos/editar.vue');
const Mostrar = () => import('./components/productos/mostrar.vue');

//creamos las rutas
export const routes = [
    {
        name: 'mostrarProducto',
        path: '/',
        component: Mostrar
    },
    {
        name: 'crearProducto',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarProducto',
        path: '/editar/:id ',
        component: Editar
    }
];