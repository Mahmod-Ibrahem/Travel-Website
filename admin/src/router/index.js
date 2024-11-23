import { createRouter, createWebHistory } from "vue-router";
import store from "../store";
import AppLayout from "../components/AppLayout.vue";
import Login from "../views/Login.vue";
import ProductForm from "../views/Products/ProductForm.vue";
import Products from "../views/Products/products.vue";
import Categories from "../views/Category/Categories.vue";
import CategoryForm from "../views/Category/CategoryForm.vue";
import ProductImages from "../views/Products/ProductImages.vue";

const routes = [
    {
        path: "/",
        name: "default",
        component: Login,
    },
    {
        path: "/app",
        name: "app",
        component: AppLayout,
        meta: {
            requireAuth: true,
        },
        children: [
            {
                path: "products",
                name: "app.products",
                component: Products,
            },
            {
                path: "products/create",
                name: "app.products.create",
                component: ProductForm,
            },
            {
                path: "products/:id",
                name: "app.products.edit",
                component: ProductForm,
            },
            {
                path: "products/Images/:id",
                name: "app.products.view",
                component: ProductImages,
            },
            {
                path: "categories",
                name: "app.categories",
                component: Categories,
            },
            {
                path: "categories/create",
                name: "app.categories.create",
                component: CategoryForm,
            },
            {
                path: "categories/:id",
                name: "app.categories.edit",
                component: CategoryForm,

            },
        ],
    },

    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            requireGuest: true,
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requireAuth && !store.state.user.token) {
        next({ name: "login" });
    } else if (to.meta.requireGuest && store.state.user.token) {
        next({ name: "app.dashboard" });
    } else {
        next();
    }
});

export default router;
