import axios from 'axios'

async function getData(to) {
    return new Promise(async resolve => {
        let response = await axios.get(`/api${to.path}`)
        resolve(response.data)
    })
}

export default {
    async beforeRouteEnter(to, from, next) {
        let data = await getData(to)
        next(component => component.assignData(data))
    }
}
