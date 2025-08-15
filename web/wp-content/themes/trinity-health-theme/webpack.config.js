const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    watchOptions: {
        ...defaultConfig.watchOptions,
        ignored: ['**/node_modules/**', '**/build/**'],
        poll: 1000,
    },
};