'use strict';

const { src, dest } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');
const terser = require('gulp-terser');

//compile, prefix, and min scss
function css() {
  return src('assets/styles/*.scss') // change to your source directory
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(minify())
    .pipe(dest('public/css')) // change to your final/public directory
};

function js(){
    return src('assets/js/*.js') // change to your source directory
      .pipe(terser())
      .pipe(dest('public/js')); // change to your final/public directory
}

exports.css = css;
exports.js = js;