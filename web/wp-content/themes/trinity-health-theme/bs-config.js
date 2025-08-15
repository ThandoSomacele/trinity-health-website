module.exports = {
    proxy: 'https://trinity-health-website.ddev.site',
    files: [
        './**/*.php',
        './build/**/*.css',
        './build/**/*.js',
        './assets/dist/**/*.css',
        './assets/dist/**/*.js'
    ],
    reloadDelay: 1000,
    notify: true,
    open: false,
    port: 3000,
    ui: {
        port: 3001
    },
    ghostMode: false,
    reloadOnRestart: true,
    injectChanges: false,
    ignore: ['node_modules/**']
};