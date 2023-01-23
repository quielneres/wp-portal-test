module.exports = {
  options: {
    font: 'icons',
    fontFilename: 'Bicons',
    fontFamilyName: 'Bicons',
    hashes: false,
    types: ['woff'],
    template: './tasks/misc/webfont/bem.scss',
    templateOptions: {
      baseClass: 'i',
      classPrefix: 'i--',
      mixinPrefix: 'i--'
    },
    stylesheet: 'scss',
    relativeFontPath: '/wp-content/themes/greenplace/fonts',
    htmlDemo: false,
    codepointsFile: './src/images/icons/.codepoints.json'
  },
  build: {
    src: './src/images/icons/*.svg',
    dest: './fonts',
    destCss: './src/styles/objects'
  }
};
