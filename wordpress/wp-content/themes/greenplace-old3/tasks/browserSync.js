module.exports = {
  options: {
    background: true,
    notify: false,
    ghostMode: false
  },
  dev: {
    options: {
      files: [
        './tmp/*.html',
        './*.css',
        './{,*/}*.php'
      ],
      proxy: '127.0.0.1:8000',
      port: 8080,
      host: '127.0.0.1',
      serveStatic: ['./tmp']
    }
  }
};
