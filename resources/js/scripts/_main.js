import core from "./core.js"
import handleRequests from "./handleRequests.js"
import handleForms from "./handleForms.js"

function main() {
    const main = {
        ...core(),
        ...handleRequests(),
        ...handleForms(core)
    }
    return main;
}

export default main