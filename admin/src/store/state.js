const store = {
    user: {
        token: sessionStorage.getItem("TOKEN"),
        data: {},
    },
    products: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: 10,
        total: null,
    },
    categories: {
        data: null,
        loading: true
    },
    toast: {
        show: false,
        message: "",
        delay: 5000,
    },
};

export default store;
