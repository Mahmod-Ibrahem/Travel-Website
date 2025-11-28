import axiosClient from "../axios";
import {setProducts} from "./mutations.js";

export function getCurrentUser({commit}, data) {
    return axiosClient.get('/user', data)
        .then(({data}) => {
            commit('setUser', data);
            return data;
        })
}

export function login({commit}, data) {
    return axiosClient.post("/login", data).then(({data}) => {
        commit("setUser", data.user);
        commit("setToken", data.token);
        return data;
    });
}

export function logout({commit}) {
    return axiosClient.post("/logout").then((response) => {
        commit("setToken", null);
        return response;
    });
}

export function getProducts(
    {commit},
    {url = null, search = null, sortField, sortDirection, perPage, locale} = {}
) {
    commit("setProducts", [true]);
    url = url || "/products";
    return axiosClient
        .get(url, {
            params: {search, sortField, sortDirection, perPage, locale},
        })
        .then((res) => {
            commit("setProducts", [false, res.data]);
        })
        .catch(() => {
            commit("setProducts", [false]);
        });
}

export function createProduct({commit}, product) {
    if (product.tour_cover instanceof File) {
        const form = new FormData();
        form.append('group', product.group);
        form.append('preference', product.preference);
        form.append('title', product.title);
        form.append('description', product.description);
        form.append('itenary_title', product.itenary_title);
        form.append('itenary_section', product.itenary_section);
        form.append('places', product.places);
        product.locations.forEach((location, index) => {
            form.append(`locations[${index}]`, location);
        })
        product.included.forEach((included,index)=>{
            form.append(`included[${index}]`,included)
        })
        product.excluded.forEach((excluded,index)=>{
            form.append(`excluded[${index}]`,excluded)
        })
        form.append('duration', product.duration);
        form.append('price_per_person', product.price_per_person);
        form.append('price_two_five', product.price_two_five);
        form.append('price_six_twenty', product.price_six_twenty);
        form.append('tour_cover', product.tour_cover);
        product.tour_images.forEach((file, index) => {
            form.append(`tour_images[${index}]`, file); // Add each file to FormData
        });
        product = form;
    }
    return axiosClient.post('/products', product)
}

export function updateProduct({commit}, product) {
    const id = product.id;
    if (product.tour_cover instanceof File || Array.isArray(product.tour_images)) {
        const form = new FormData();
        form.append('group', product.group);
        form.append('preference', product.preference);
        form.append('title', product.title);
        form.append('description', product.description);
        form.append('itenary_title', product.itenary_title);
        form.append('locations', product.locations);
        form.append('places', product.places);
        form.append('itenary_section', product.itenary_section);
        form.append('included', product.included);
        form.append('excluded', product.excluded);
        form.append('duration', product.duration);
        form.append('price_per_person', product.price_per_person);
        form.append('price_two_five', product.price_two_five);
        form.append('price_six_twenty', product.price_six_twenty);
        form.append('tour_cover', product.tour_cover);
        product.tour_images.forEach((file, index) => {
            form.append(`tour_images[${index}]`, file); // Add each file to FormData
        });
        product.deleted_images_ids?.forEach((id, index) => {
            form.append(`deleted_images_ids[${index}]`, id);
        });
        form.append('_method', 'PUT');
        product = form
    } else {
        product._method = "PUT";
    }
    return axiosClient.post(`/products/${id}`, product);
}


export function deleteProduct({commit}, id) {
    return axiosClient.delete(`/products/${id}`)
}

export function getProduct({}, {productId, locale} = {}) {
    return axiosClient.get(`/products/${productId}`, {params: {locale}})
}


export function deleteProductImage({commit}, id) {
    return axiosClient.delete(`/products/deleteImage/${id}`)
}

export function addProductImages({commit}, images) {
    const id = images.id
    const form = new FormData();
    images.tour_images.forEach((file, index) => {
        form.append(`tour_images[${index}]`, file); // Add each file to FormData
    });
    form.append('group', images.group);
    form.append('title', images.title);
    form.append('_method', 'PUT');
    images = form
    return axiosClient.post(`/addImageToTour/${id}`, images)
}


export function getCategories({commit}, {locale} = {}) {
    return axiosClient.get('/categories', {params: {locale}}).then(({data}) => {
        commit('setCategories', data)
    })
}

export function getCategory({commit}, {id, locale} = {}) {
    // debugger
    return axiosClient.get(`/categories/${id}`, {params: {locale}})
}

export function createCategory({commit}, category) {
    if (category.image instanceof File) {
        const form = new FormData();
        form.append('type', category.type);
        form.append('header', category.header);
        form.append('bg_header', category.bg_header);
        form.append('description', category.description);
        form.append('name', category.name);
        form.append('image', category.image);
        form.append('title_meta', category.title_meta);
        form.append('description_meta', category.description_meta);
        form.append('locale', category.locale);
        category = form;
    }
    return axiosClient.post('/categories', category)
}

export function updateCategory({commit}, category) {
    const id = category.id;
    if (category.image instanceof File) {
        const form = new FormData();
        form.append("id", category.id);
        form.append("categoryTranslationId", category.categoryTranslationId);
        form.append('type', category.type);
        form.append('locale', category.locale);
        form.append('header', category.header);
        form.append('bg_header', category.bg_header);
        form.append('description', category.description);
        form.append('name', category.name);
        form.append('image', category.image);
        form.append('title_meta', category.title_meta);
        form.append('description_meta', category.description_meta);
        form.append("_method", "PUT");//to make laravel understand that it update not post
        category = form;
    } else {
        category._method = "PUT";
    }
    return axiosClient.post(`/categories/${id}`, category);
}

export function getReviews(
    {commit},
    {url = null, search = null, sortField, sortDirection, perPage} = {}
) {
    // commit("setReviews", [true]);
    url = url || "/reviews";
    return axiosClient
        .get(url, {
            params: {search, sortField, sortDirection, perPage},
        })
        .then((res) => {
            commit("setReviews", res.data);
        })
        .catch(() => {
        });

}

export function getReview({commit}, id) {
    return axiosClient.get(`/review/${id}`)
}

export function createReview({commit}, review) {
    return axiosClient.post('/review', review)
}

export function updateReview({commit}, review) {
    const id = review.id;
    return axiosClient.put(`/review/${id}`, review);
}

export function deleteReview({commit}, id) {
    return axiosClient.delete(`/review/${id}`)
}

export function getNonTranslatedTours({commit}) {
    return axiosClient.get('/getNonTranslatedTours').then(({data}) => {
        return data
    })
}

export function TranslateNewTour({commit}, product) {
    return axiosClient.post('/translateNewTour', product)
}

export function updateTourTranslation({commit}, product) {
    product['locale'] = 'sp'
    return axiosClient.put(`/updateTranslationOfTour/${product.tourTranslationId}`, product)
}

export function getNonTranslatedCategories({commit}) {
    return axiosClient.get('/getNonTranslatedCategories').then(({data}) => {
        return data
    })
}

export function createCategoryTranslation({commit}, category) {
    return axiosClient.post('/translateNewCategory', category)
}

export function updateCategoryTranslation({commit}, category) {
    return axiosClient.put(`/updateTranslationOfCategory/${category.categoryTranslationId}`, category)
}

export function getFaqs({commit}) {
    return axiosClient.get('/faqs').then(({data}) => {
        commit('setFaqs', data)
    })
}

export function getFaq({commit}, id) {
    return axiosClient.get(`/faqs/${id}`)
}

export function createFaq({commit}, faq) {
    return axiosClient.post('/faqs', faq)
}

export function updateFaq({commit}, faq) {
    const id = faq.id;
    return axiosClient.put(`/faqs/${id}`, faq);
}

export function deleteFaq({commit}, id) {
    return axiosClient.delete(`/faqs/${id}`)
}

/*Cities*/
export function getCities({commit}) {
    return axiosClient.get('/city').then(({data}) => {
        commit('setCities', data)
    })
}

export function getCity({commit}, {cityId}) {
    console.log(cityId)
    return axiosClient.get(`/city/${cityId}`)
}

export function createCity({commit}, city) {
    if (city.image instanceof File) {
        const form = new FormData();
        form.append('name', city.name);
        form.append('image', city.image);
        city = form;
    }
    return axiosClient.post('/city', city)
}

export function updateCity({commit}, city) {
    const id = city.id;
    if (city.image instanceof File) {
        const form = new FormData();
        form.append('id', city.id);
        form.append('name', city.name);
        form.append('image', city.image);
        form.append('_method', 'PUT');
        city = form;
    } else {
        city._method = "PUT";
    }
    return axiosClient.post(`/city/${id}`, city);
}

export function deleteCity({commit}, id) {
    return axiosClient.delete(`/city/${id}`)
}

/* Blogs*/
export function getBlogs({commit, state}) {
    state.blogs.loading = true
    return axiosClient.get('/blog').then(({data}) => {
        commit('setBlogs', data)
    })
}

export function getBlog({commit}, id) {
    return axiosClient.get(`/blog/${id}`)
}

export function createBlog({commit}, blog) {
    if (blog.image instanceof File) {
        const form = new FormData();
        form.append('title', blog.title);
        form.append('blog', blog.blog);
        form.append('city_id', blog.city_id);
        form.append('image', blog.image);
        blog = form;
    }
    return axiosClient.post('/blog', blog)
}

export function updateBlog({commit}, blog) {
    const id = blog.id;
    if (blog.image instanceof File) {
        const form = new FormData();
        form.append('id', blog.id);
        form.append('title', blog.title);
        form.append('blog', blog.blog);
        form.append('city_id', blog.city_id);
        form.append('image', blog.image);
        form.append('_method', 'PUT');
        blog = form;
    } else {
        blog._method = "PUT";
    }
    return axiosClient.post(`/blog/${id}`, blog);
}

export function deleteBlog({commit}, id) {
    return axiosClient.delete(`/blog/${id}`)
}

export function createLocation({commit}, location) {
    if (location.image instanceof File) {
        const form = new FormData();
        form.append('name', location.name);
        form.append('image', location.image);
        form.append('position', location.position);
        location = form
    }
    return axiosClient.post('/locations', location)
}

export function getLocations({commit}) {
    return axiosClient.get('/locations').then(({data}) => {
        commit('setLocations', data)
    })
}

export function getLocation({commit}, id) {
    return axiosClient.get(`/locations/${id}`)
}

export function updateLocation({commit}, location) {
    const id = location.id;
    if (location.image instanceof File) {
        const form = new FormData();
        form.append('name', location.name);
        form.append('image', location.image);
        form.append('position', location.position);
        form.append('_method', 'PUT');
        location = form
    } else {
        location._method = "PUT"
    }
    return axiosClient.post(`/locations/${id}`, location);
}

export function deleteLocation({commit}, id) {
    return axiosClient.delete(`/locations/${id}`)
}

export function getLocationForTranslation(__, id) {
    return axiosClient.get(`/get-location-for-translation/${id}`)
}

export function createLocationTranslation(__, location) {
    return axiosClient.put(`/create-location-translation/${location.id}`, location)
}

/* Inclusions */
export function getInclusions({commit}, {url = null, perPage = 20} = {}) {
    url = url || '/inclusions';
    return axiosClient.get(url, {
        params: {perPage}
    }).then(({data}) => {
        commit('setInclusions', data)
    })
}

export function getInclusion({commit}, {inclusionId}) {
    return axiosClient.get(`/inclusions/${inclusionId}`)
}

export function createInclusion({commit}, inclusion) {
    return axiosClient.post('/inclusions', inclusion)
}

export function updateInclusion({commit}, inclusion) {
    const id = inclusion.id;
    inclusion._method = "PUT";
    return axiosClient.post(`/inclusions/${id}`, inclusion);
}

export function deleteInclusion({commit}, id) {
    return axiosClient.delete(`/inclusions/${id}`)
}

/* Exclusions */
export function getExclusions({commit}, {url = null, perPage = 20} = {}) {
    url = url || '/exclusions';
    return axiosClient.get(url, {
        params: {perPage}
    }).then(({data}) => {
        commit('setExclusions', data)
    })
}

export function getExclusion({commit}, {exclusionId}) {
    return axiosClient.get(`/exclusions/${exclusionId}`)
}

export function createExclusion({commit}, exclusion) {
    return axiosClient.post('/exclusions', exclusion)
}

export function updateExclusion({commit}, exclusion) {
    const id = exclusion.id;
    exclusion._method = "PUT";
    return axiosClient.post(`/exclusions/${id}`, exclusion);
}

export function deleteExclusion({commit}, id) {
    return axiosClient.delete(`/exclusions/${id}`)
}
