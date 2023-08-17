new Vue({
    el: '#apps',
    template: `
        <h1>Hello</h1>
    `,
    data() {
        return {
            message: 'Hello Vue!'
        }
    },
    methods: {

    },
    mounted() {
        console.log('Component Mounted 1');
    }
})