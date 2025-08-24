const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    devServer: {
        ...defaultConfig.devServer,
        allowedHosts: ".ddev.site", // Allow DDEV sites for hot reload
    },
    watchOptions: {
        ...defaultConfig.watchOptions,
        ignored: ['**/node_modules/**', '**/build/**'],
        poll: 1000,
    },
};