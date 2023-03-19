import core from "./core.js"
import requests from "./requests.js"

function main() {
    const main = {
        ...core(),
        ...requests()
    }
    return main;
}

export default main