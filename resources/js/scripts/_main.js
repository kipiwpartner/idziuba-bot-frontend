import core from "./core.js"
import handleAxios from "./handleAxios.js"
import handleForm from "./handleForm.js"
import handleNotify from "./handleNotify.js"

function main() {
    const main = {
        ...core(),
        ...handleAxios(),
        ...handleForm(core),
        ...handleNotify()
    }
    return main;
}

export default main