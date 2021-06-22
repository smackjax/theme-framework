// This file consolidates multiple files into their own php file output, which is then included 
// in functions.php at runtime.
const path = require('path');
const HtmlPlugin = require('html-webpack-plugin');
const checkForFilenames = require('../../_webpack/check-for-filenames');



const pluginsToExport = [];
// Search for files in this directory with names containing .php
checkForFilenames(__dirname, '.php', function( fullFilePath, filename ){
    pluginsToExport.push(
        new HtmlPlugin({
            template: fullFilePath,
            filename: ( './functions-includes/' + filename ),
            // functions.php doesn't need chunks added
            inject: false,
            minify: false,
        })
    );
});

module.exports = pluginsToExport;