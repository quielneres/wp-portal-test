const sass = require('node-sass');

module.exports = {
  options: {
    implementation: sass,
    includePaths: ['./node_modules']
  },
  dev: {
    options: {
      sourceMap: true
    },
    expand: true,
    cwd: './src/styles',
    src: '{,*/}*.scss',
    dest: './',
    ext: '.css'
  }
};
