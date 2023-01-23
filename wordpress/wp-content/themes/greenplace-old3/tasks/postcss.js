module.exports = {
  options: {
    processors: [
      require('autoprefixer')()
    ]
  },
  dev: {
    options: {
      map: true
    },
    src: './style.css'
  }
};
