'use strict';

const { src, dest } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');


//compile, prefix, and min scss
function css() {
  return src('assets/styles/*.scss') // change to your source directory
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minify())
    .pipe(dest('public/css')) // change to your final/public directory
};

exports.css = css;
