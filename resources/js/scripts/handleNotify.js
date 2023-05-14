function handleNotify() {
    return {
        /**
         *
         * @param notify
         * @param {string} title
         * @param {string} message
         * @param {string} type
         */
        notify: function (notify, title, message, type) {
            notify({
                title: title,
                message: message,
                type: type,
            })

        }
    }
}

export default handleNotify;