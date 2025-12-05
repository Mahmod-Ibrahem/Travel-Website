import axiosClient from "../../../axios";

export function getNotifications({commit},{page:page})
{
    return axiosClient.get(`/notifications?page=${page}`).then(({data})=>{
        commit("setNotifications",data)
    })
}

export function markAllAsRead({commit})
{
    return axiosClient.post(`/notifications/mark-all-as-read`)
}