function handleForm(core) {
    const formCore = core();
    return {
        setError: function (id, msg) {
            const errorNode = formCore.elById(`${id}Error`)
            errorNode.innerHTML = msg
            errorNode.parentNode.parentNode.classList.add("is-error", "is-required");
        },
        setErrorArray: function (arr) {
            for (const key in arr) {
                this.setError(key, arr[key])
            }
        },
        resetError: function (id) {
            const errorNode = formCore.elById(`${id}Error`)
            errorNode.innerHTML = ''
            errorNode.parentNode.parentNode.classList.remove("is-error", "is-required");
        },
        resetErrorArray: function (arr) {
            for (const key in arr) {
                this.resetError(key)
            }
        }
    }
}

export default handleForm;