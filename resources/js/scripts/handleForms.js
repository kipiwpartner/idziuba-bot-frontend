function handleForms(core) {
    const formCore = core();
    return {
        /**
         *
         * @param notify
         * @param {string} title
         * @param {string} message
         * @param {string} type
         */
        notify: function (notify, title, message, type) {
            console.log(formCore.elById('email' + 'Error'))
            notify({
                title: title,
                message: message,
                type: type,
            })

        },
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

export default handleForms;