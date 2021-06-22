const path = require('path');
const HtmlPlugin = require('html-webpack-plugin');

module.exports = 
    new HtmlPlugin({
        // Template is EJS 
        template: path.join(__dirname, './', 'front-page.ejs'),
        // Outputs into a PHP file
        filename: 'index.php',
        chunks: []
    });