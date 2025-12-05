const store = {
    user: {
        token: localStorage.getItem("TOKEN"),
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
        loading: true,
        total: null
    },
    reviews:{
        data:null,
        loading:true,
        from: null,
        to: null,
        total: null,
        limit:10,
        link:[]
    },
    toast: {
        show: false,
        message: "",
        delay: 5000,
    },
    errorToast: {
        show: false,
        message: "",
        delay: 5000,
    },
    faqs: {
        data: null,
        loading: true,
    },
    cities: {
        data: null,
        loading: true,
    },
    blogs: {
        loading: false,
        data: [],
    },
    locations: {
        data: null,
        loading: true
    },
    inclusions: {
        data: [],
        loading: true,
        from: null,
        to: null,
        total: null,
        per_page: 20,
        links: []
    },
    exclusions: {
        data: [],
        loading: true,
        from: null,
        to: null,
        total: null,
        per_page: 20,
        links: []
    },
    settings: {
        data: null,
        loading: true,
    },
    bookings: {
        data: [],
        loading: true,
        from: null,
        to: null,
        total: null,
        per_page: 20,
        links: []
    },
};

export default store;
