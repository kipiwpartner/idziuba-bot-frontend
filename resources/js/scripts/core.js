function core() {
    return {
        /**
         *
         * @param {string} id
         * @returns {HTMLElement}
         */
        elById: function (id) {
            return document.getElementById(id)
        }
    }
}

export default core;