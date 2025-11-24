import {createRouter, createWebHistory} from "vue-router";
import store from "../store";
import AppLayout from "../components/AppLayout.vue";
import Login from "../views/Login.vue";
import ProductForm from "../views/Products/ProductForm.vue";
import Products from "../views/Products/products.vue";
import Categories from "../views/Category/Categories.vue";
import CategoryForm from "../views/Category/CategoryForm.vue";
import ProductImages from "../views/Products/ProductImages.vue";
import Reviews from "../views/Reviews/Reviews.vue";
import ReviewForm from "../views/Reviews/ReviewForm.vue";
import ToursGer from "../views/TourSP/ToursSP.vue";
import ToursFormGer from "../views/TourSP/ToursFormSP.vue";
import CategoriesSp from "../views/CategorySp/CategoriesSp.vue";
import CategoryFormSp from "../views/CategorySp/CategoryFormSp.vue";
import Faqs from "../views/Faq/Faqs.vue";
import FaqForm from "../views/Faq/FaqForm.vue";
import Cities from "../views/City/Cities.vue";
import CityForm from "../views/City/CityForm.vue";
import Blogs from "../views/Blogs/Blogs.vue";
import BlogsForm from "../views/Blogs/BlogsForm.vue";
import Locations from "../views/Locations/Locations.vue";
import LocationForm from "../views/Locations/LocationForm.vue";
import LocationTranslationForm from "../views/Locations/LocationTranslationForm.vue";

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
            {
                path: "categories/spanish",
                name: "app.categories.sp",
                component: CategoriesSp,
            },
            {
                path: "categories/sp/create",
                name: "app.categories.sp.create",
                component: CategoryFormSp,
            },
            {
                path: "categories/sp/:id",
                name: "app.categories.sp.edit",
                component: CategoryFormSp,

            },
            {
                path: 'reviews',
                name: 'app.reviews',
                component: Reviews
            },
            {
                path: 'reviews/create',
                name: 'app.reviews.create',
                component: ReviewForm
            },
            {
                path: 'reviews/:id',
                name: 'app.reviews.edit',
                component: ReviewForm
            },
            {
                path: 'faqs',
                name: 'app.faqs',
                component: Faqs
            },
            {
                path: 'faq/create',
                name: 'app.faq.create',
                component: FaqForm
            },
            {
                path: 'faqs/:id',
                name: 'app.faq.edit',
                component: FaqForm
            },
            {
                path: 'cities',
                name: 'app.cities',
                component: Cities
            },
            {
                path: 'cities/create',
                name: 'app.cities.create',
                component: CityForm
            },
            {
                path: 'cities/:id',
                name: 'app.cities.edit',
                component: CityForm
            },
            {
                path: 'tours/de',
                name: 'app.tours.ger',
                component: ToursGer
            },
            {
                path: 'tours/de/create',
                name: 'app.tours.de.create',
                component: ToursFormGer
            },
            {
                path: 'tours/GER/:id',
                name: 'app.tours.ger.edit',
                component: ToursFormGer
            },
            {
                path: 'blog',
                name: 'app.blogs',
                component: Blogs
            },
            {
                path: 'blog/create',
                name: 'app.blogs.create',
                component: BlogsForm
            },
            {
                path: 'blog/:id',
                name: 'app.blogs.edit',
                component: BlogsForm
            },
            {
                path: "locations",
                name: "app.locations",
                component: Locations
            },
            {
                path: "locations/create",
                name: "app.locations.create",
                component: LocationForm
            },
            {
                path: "locations/:id",
                name: "app.locations.edit",
                component: LocationForm
            },
            {
                path: 'location-translation/:id',
                name: 'app.locations.createTranslation',
                component: LocationTranslationForm
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
        next({name: "login"});
    } else if (to.meta.requireGuest && store.state.user.token) {
        next({name: "app.dashboard"});
    } else {
        next();
    }
});

export default router;
