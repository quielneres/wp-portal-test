module.exports = {
  dev: {
    options: {
      pretty: true
    },
    files: [{
      expand: true,
      cwd: 'src/views/pages',
      src: '{,*/}*.pug',
      dest: 'tmp',
      ext: '.html'
    }]
  }
};
