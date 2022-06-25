//importamos los componentes

const Crear = () => import('./components/productos/crear.vue');
const Editar = () => import('./components/productos/editar.vue');
const Mostrar = () => import('./components/productos/mostrar.vue');
const Show = () => import('./components/productos/show.vue');
const Calificar = () => import('./components/productos/calificar.vue');
const Inventario = () => import('./components/productos/inventario.vue');

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
    },
    {
        name: 'showProducto',
        path: '/show/:id ',
        component: Show
    },
    {
        name: 'calificarProducto',
        path: '/calificar/:id ',
        component: Calificar
    },
    {
        name: 'inventarioProducto',
        path: '/inventario/:id ',
        component: Inventario
    }
];