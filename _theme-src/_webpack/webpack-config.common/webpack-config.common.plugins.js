const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const checkForFileNames = require('../check-for-filenames');
const filenameFlags = require('../filename-filters-config');


// Finds all files with html-plugin exports
const singleFilePrefix = filenameFlags['html-plugin-single'];


var HtmlPlugins = [];
function onFileFound(fullFilePath) {
    HtmlPlugins.push( require("" + fullFilePath) );
}
// Start recursion for html-plugins with one export
checkForFileNames(path.join(__dirname, '../', '../'), singleFilePrefix, onFileFound);


// Finds all files with html-plugin arrays exports
const arrayFilePrefix = filenameFlags['html-plugin-array'];
let HtmlArrayPlugins = []
function onArrayFound(fullFilePath) {
    const foundPluginArray = require("" + fullFilePath);
    HtmlArrayPlugins = [ ...HtmlArrayPlugins, ...foundPluginArray ];
}
// Start recursion for html-plugins with an array export
checkForFileNames(path.join(__dirname, '../', '../'), arrayFilePrefix, onArrayFound);



module.exports = ()=>([
    // Where the css files will be output to, and their names
    new MiniCssExtractPlugin({
        filename: './css/[name].style.css',
        chunkFilename: './css/[name].style.css',
    }),
 
    // ======= HTML pages ===========
    ...HtmlPlugins,
    ...HtmlArrayPlugins
])