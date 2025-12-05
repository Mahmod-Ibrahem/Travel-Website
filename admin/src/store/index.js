import {createStore} from "vuex"
import * as mutations from './mutations'
import * as actions from './actions'
import state from "./state"
import notificationsModule from "./modules/notifications";

const store=createStore({
    modules: {
        notifications: notificationsModule,
    },
    state,
    getters:{},
    actions,
    mutations,
})
export default store

