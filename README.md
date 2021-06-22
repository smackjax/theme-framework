## WordPress theme framework
I found theme development for Wordpress to have a lot of boilerplate and difficult to break into modular components, especially after coming from ReactJS.
This is my project to easily use Webpack for theme development.

### To use
Files in the _theme-src folder that begin with `_html-plugin.` must return an html-plugin object. 
Files in the _theme-src folder that begin with `_webpack-chunk.` must be a JS file and will have any 'imported' files put into the appropriate folder in the parent folder, and named the string after the first dot following `_webpack-chunk`. 
For example, a CSS file imported in `_webpack-chunk.awesome.js` will be output to the parent(theme root) folder under '/css/awesome.css'. 

The best way I found of live refreshing for the page(in most circumstances) is using browser-sync to watch for file changes. 
So for full functionality both Webpack and Browser-sync must be running.

`npm run start-webpack`
`npm run start-browser-sync`

Voila! The flexibility of Webpack, ability to use modular build code and composite run code, plus a shallow live folder structure.
It must be restarted when adding a new html-plugin or chunk.