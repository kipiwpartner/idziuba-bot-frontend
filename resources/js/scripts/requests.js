function requests() {

    const instance = axios.create();
    const global = {};
    return {
        /**
         *
         * @returns object
         */
        getOptions: function () {
            const options = {
                timeout: 5000,
                headers: {
                    'X-CSRF-TOKEN': global.csrf,
                    'X-Requested-With': 'XMLHttpRequest'
                },
            };
            return options;
        },
        /**
         *
         * @param {string} url
         * @param {string} method
         * @param {object} data
         */
        onAxiosCall: function (url, data, method) {
            let global = this.getGlobal(true);

            switch (method.toLowerCase()) {
                case 'post':
                    try {
                        return instance.post(url, data, this.getOptions());
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                case 'get':
                    try {
                        return instance.get(url, data, this.getOptions());
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                case 'put':
                    try {
                        return instance.put(url, data, this.getOptions());
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                case 'patch':
                    try {
                        return instance.patch(url, data, this.getOptions());
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                case 'delete':
                    try {
                        return instance.delete(url, data, this.getOptions());
                    } catch (error) {
                        console.error(error);
                    }
                    break;
                default:
                    console.log(`Bad method ${method}`)
            }
            },
        /**
         *
         * @returns object
         * @param initGlobalValue
         */
        getGlobal: function (initGlobalValue = false) {
            if (initGlobalValue){
                global.csrf = document.querySelector('meta[name="X-CSRF-TOKEN"]').content
            }
            return global
        }
    }
}

export default requests;