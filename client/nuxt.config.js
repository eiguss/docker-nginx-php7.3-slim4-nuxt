export default {
    server:{
        host:"0.0.0.0"
    },
    generate: {
        dir: '../html/server/public'
    },
    srcDir: 'nuxt/',
    ssr: false,
    target: 'static',
    head: {
        title: 'nginx slim php and nuxt',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
        ]
    },
    css: [
    ],
    plugins: [
    ],
    components: true,
    buildModules: [
    ],
    modules: [
    ],
    build: {
    }
}
