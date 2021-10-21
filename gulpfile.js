const gulp = require('gulp');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const tabify = require('gulp-tabify');
const cleancss = require('gulp-clean-css');
const cssbeautify = require('gulp-cssbeautify');

/**
 * -------------------------------------------------------------------------
 * Javascript Files
 * -------------------------------------------------------------------------
 */
function processCss()
{
    return gulp.src('resources/sass/app.scss')
        .pipe(sass())
        .pipe(concat('app.css'))
        .pipe(cleancss())
        .pipe(gulp.dest('public/css'));
}

function processJs()
{
    return gulp.src([
            'resources/js/app.js',
            'resources/js/bootstrap.js',
        ])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/js'));
}

function watch()
{
    gulp.watch([
        'resources/sass/**/*.scss',
        'resources/sass/*.scss',
        ], processCss);

    gulp.watch([
        'resources/js/**/*.js',
        'resources/js/*.js',
        ], processJs);
}

exports.processCss = processCss;
exports.processJs = processJs;
exports.watch = watch;
exports.default = watch;
