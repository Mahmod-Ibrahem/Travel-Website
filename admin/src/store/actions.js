import axiosClient from "../axios";

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
    {url = null, search = null, sortField, sortDirection,perPage} = {}
) {
    commit("setProducts", [true]);
    url = url || "/products";
    return axiosClient
        .get(url, {
            params: {search, sortField, sortDirection,perPage},
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
        form.append('category_id', product.category_id);
        form.append('preference', product.preference);
        form.append('title', product.title);
        form.append('description', product.description);
        form.append('itenary_title', product.itenary_title);
        form.append('itenary_section', product.itenary_section);
        form.append('places', product.places);
        form.append('locations', product.locations || '');
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
        product = form;
    }
    return axiosClient.post('/products', product)
}

export function updateProduct({commit}, product) {
    const id = product.id;
    console.log(product)
    if (product.tour_cover instanceof File) {
        const form = new FormData();
        form.append('group', product.group);
        form.append('category_id', product.category_id);
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
        form.append('_method', 'PUT');
        product=form
    } else {
        product._method = "PUT";
    }
    return axiosClient.post(`/products/${id}`, product);
}


export function deleteProduct({commit}, id) {
    return axiosClient.delete(`/products/${id}`)
}

export function getProduct({}, product) {
    return axiosClient.get(`/products/${product}`)
}


export function deleteProductImage({commit},id) {
    //Images hena hya kol al product with image ana 8lt fi al def bta3ha
    return axiosClient.delete(`/products/deleteImage/${id}`)
}

export function addProductImages({commit}, images) {
    const id = images.id
    const form=new FormData();
    images.tour_images.forEach((file, index) => {
        form.append(`tour_images[${index}]`, file); // Add each file to FormData
    });
    form.append('group', images.group);
    form.append('title', images.title);
    form.append('_method', 'PUT');
    images=form
    return axiosClient.post(`/addImageToTour/${id}`, images)
}


export function getCategories({commit}) {
    return axiosClient.get('/categories').then(({data}) => {
        commit('setCategories', data)
    })
}

export function getCategory({commit}, id) {
    return axiosClient.get(`/categories/${id}`)
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
        category = form;
    }
    console.log(category)
    return axiosClient.post('/categories', category)
}

export function updateCategory({commit}, category) {
    const id = category.id;
    if (category.image instanceof File) {
        const form = new FormData();
        form.append("id", category.id);
        form.append("name", category.name);
        form.append("type", category.type);
        form.append("image", category.image);
        form.append("_method", "PUT");//to make laravel understand that it update not post
        category = form;
    } else {
        category._method = "PUT";
    }
    return axiosClient.post(`/categories/${id}`, category);
}

export function deleteCategory({commit}, id) {
    return axiosClient.delete(`/categories/${id}`)
}



