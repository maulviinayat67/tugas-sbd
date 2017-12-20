var path = require('path')
var ExtractTextPlugin = require('extract-text-webpack-plugin')

module.exports = {
  entry : ['./src/app.js','./src/scss/main.scss'],
  output : {
    path : path.resolve(__dirname,'./assets/'),
    publicPath : './assets/',
    filename : 'js/main-home.js'
  },
  module : {
    rules : [
      {
        test : /\.js$/,
        loader : 'babel-loader',
        exclude : /node_modules/,
        query : {
          presets : ['es2015','stage-2']
        }
      },
      {
        test : /\.(sass|scss)$/,
        loader : ExtractTextPlugin.extract(['css-loader','sass-loader'])
      },
      {
        test : /\.vue$/,
        loader : 'vue-loader',
        options : {
          loaders : {}
        }
      }
    ]
  },
  resolve : {
    alias : {
      'vue$':'vue/dist/vue.esm.js'
    }
  },
  plugins : [
    new ExtractTextPlugin({
      filename : 'css/front/main-home.css',
      allChunks : true
    })
  ]

}
