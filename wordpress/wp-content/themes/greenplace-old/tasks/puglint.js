module.exports = {
  options: {
    extends: './.pug-lintrc.json'
  },
  dev: {
    expand: true,
    src: [
      './src/views/layouts/*.pug',
      './src/views/pages/{,*/}*.pug',
      './src/views/partials/{,*/}*.pug'
    ]
  }
};
