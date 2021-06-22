const {dirname, join, basename} = require('path');
// Path to build folder
const buildPath = join(__dirname, '../', '../', '../');

const themeFolderName = basename(buildPath);

module.exports = ()=>({
    // Path to assets on build
    path: buildPath,
    filename: './js/[name].script.js',
    publicPath: ('wp-content/themes/' + themeFolderName),
});
