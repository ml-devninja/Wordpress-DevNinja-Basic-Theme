var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-cssnano');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('minify-css', function () {
    gulp.src([
            'css/dep/bootstrap.min.css',
            'css/dep/styles.css',
        ])
        .pipe(autoprefixer())
        .pipe(minifyCSS())
        .pipe(concat('styles.min.css'))
        .pipe(gulp.dest('./css/'));
});

gulp.task('minify-js', function () {
    gulp.src([
            'js/dep/bootstrap.min.js',
            'js/dep/custom-js.js',
        ])
        .pipe(concat('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./js/'));
});


gulp.task('default', ['minify-css', 'minify-js'], function () {
    gulp.watch(['css/dep/styles.css'], ['minify-css']);
    gulp.watch(['js/dep/custom-js.js'], ['minify-js']);
});