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
        setError: function (id, mandatory) {

        },
        setErrorArray: function (arr) {

        },
        resetError: function (id) {

        },
        resetErrorArray: function (arr) {

        }
    }
}

export default handleForms;