const { resolve } = require('path');

module.exports = {
  options: {
    port: 8000
  },
  dev: {
    options: {
      base: '../../wp',
      directives: {
        upload_max_filesize: '64M'
      }
    }
  }
};
