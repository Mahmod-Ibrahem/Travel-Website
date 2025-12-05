export function setNotifications(state, response) {
    state.data = response.data;
    state.links = response.links;
    state.meta = response.meta;
}