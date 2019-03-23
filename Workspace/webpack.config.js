const ExtractTextPlugin = require("extract-text-webpack-plugin");
const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
module.exports = {
  entry: {
    'index': ['./src/js/index.js'],
    'about': ['./src/js/about.js'],
    'hairstyle': ['./src/js/hairstyle.js'],
    'stylist': ['./src/js/stylist.js'],
    'teaching': ['./src/js/teaching.js'],
    'reservation': ['./src/js/reservation.js'],
    'verdor': ['./src/js/jquery-3.3.1.min.js'/*,'src/js/其他套件名'*/]
  },  //輸入文件
  output: {
    path: path.resolve(__dirname, './dist'),
    filename: 'js/[name]_bundle.js'  //輸出文件名稱
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: "css-loader"
        })
      },
      {
        test: /\.scss$/,
        use: ExtractTextPlugin.extract({
          fallback: "style-loader",
          use: ["css-loader","sass-loader"]
        })
      },
      {
        test: /\.(html)$/,
        use: {
          loader: 'html-loader',
          options: {
          }
        }
      },
      // {
      //   test: /\.(png|svg|jpg|gif)$/,
      //   use: [
      //       // ...
      //       {
      //           loader: 'url-loader', //是指定使用的loader和loader的配置参数
      //           options: { 
      //               name: 'images/[name].[ext]',
      //           }
      //       }
      //   ]
      // },
      {
        test: /\.(jpg|gif|png|svg|jpeg|ttf)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: 'images/'
            }
          }
        ]
      },
    ]
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: path.resolve(__dirname, './src/index.html'),
      filename: 'index.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false, //生成一個獨特的編碼 例如 js/index_bundle.js?e386a7bab2a4bba8529b
      chunks: ['verdor','index']
      // excludeChunks: ['index1.js'] 排除引用index1.js
    }),

    new HtmlWebpackPlugin({
      template: './src/hairstyle.html',
      filename: 'hairstyle.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false,
      chunks: ['verdor','hairstyle']
    }),
    new HtmlWebpackPlugin({
      template: './src/about.html',
      filename: 'about.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false,
      chunks: ['verdor','about']
    }),
    new HtmlWebpackPlugin({
      template: './src/stylist.html',
      filename: 'stylist.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false,
      chunks: ['verdor','stylist']
    }),
    new HtmlWebpackPlugin({
      template: './src/teaching.html',
      filename: 'teaching.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false,
      chunks: ['verdor','teaching']
    }),
    new HtmlWebpackPlugin({
      template: './src/reservation.html',
      filename: 'reservation.php',
      minify: {
        collapseWhitespace: false,
      },
      hash: false,
      chunks: ['verdor','reservation']
    }),
    new ExtractTextPlugin(
      'style/[name].css'
      //將編譯後的sass和css( 在js檔require和import的 )打包到style並創建css檔
    )  
  ],
};
