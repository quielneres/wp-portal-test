module.exports = {
  styles: {
    files: 'src/styles/{,*/}*.scss',
    tasks: ['stylelint:dev', 'sass:dev', 'postcss:dev', 'php:dev']
  },
  views: {
    files: [
      'src/views/layouts/*.pug',
      'src/views/pages/{,*/}*.pug',
      'src/views/partials/{,*/}*.pug'
    ],
    tasks: ['puglint:dev', 'pug:dev', 'prettify:dev']
  },
  webfonts: {
    files: 'src/images/icons/*.svg',
    tasks: 'webfont:build'
  }
};
