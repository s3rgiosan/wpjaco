/* global module require process */
module.exports = function(grunt) {
  var path = require('path');

  require('load-grunt-config')(grunt, {
    configPath: path.join(process.cwd(), 'grunt/config'),
    jitGrunt: {
      customTasksDir: 'grunt/tasks',
      staticMappings: {
        makepot: 'grunt-wp-i18n',
      },
    },
    data: {
      i18n: {
        author: 'Sérgio Santos <me@s3rgiosan.com>',
        support: 'https://github.com/s3rgiosan/wpjaco/issues',
        pluginSlug: 'wpjaco',
        mainFile: 'wpjaco',
        textDomain: 'wpjaco',
        potFilename: 'wpjaco',
      },
      badges: {
        packagist_stable:    '[![Latest Stable Version](https://poser.pugx.org/s3rgiosan/wpjaco/v/stable)](https://packagist.org/packages/s3rgiosan/wpjaco)',
        packagist_downloads: '[![Total Downloads](https://poser.pugx.org/s3rgiosan/wpjaco/downloads)](https://packagist.org/packages/s3rgiosan/wpjaco)',
        packagist_license:   '[![License](https://poser.pugx.org/s3rgiosan/wpjaco/license)](https://packagist.org/packages/s3rgiosan/wpjaco)',
        codacy_grade:        '[![Codacy Badge](https://api.codacy.com/project/badge/Grade/29989aa58394476fadc442f6490a19bf)](https://www.codacy.com/app/s3rgiosan/wpjaco?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=s3rgiosan/wpjaco&amp;utm_campaign=Badge_Grade)',
        codeclimate_grade:   '[![Code Climate](https://codeclimate.com/github/s3rgiosan/wpjaco/badges/gpa.svg)](https://codeclimate.com/github/s3rgiosan/wpjaco)',
      },
    },
  });
};
