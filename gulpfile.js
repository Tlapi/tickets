// Setup Gulp
var publicDir = 'www_root';

// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var mainBowerFiles = require('main-bower-files');

// Get all bower libraries
gulp.task("main-bower-files", function(){
    return gulp.src(mainBowerFiles(/* options */), { base: 'bower_components' })
        .pipe(gulp.dest(publicDir + '/js/libs'))
        .pipe(concat('libs.js'))
        .pipe(gulp.dest(publicDir + '/dist'))
        .pipe(rename('libs.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(publicDir + '/dist'));
});

// Lint Task
// checks any JavaScript file in our js/ directory and makes sure there are no errors in our code.
gulp.task('lint', function() {
    return gulp.src(publicDir + '/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
// compiles any of our Sass files in our scss/ directory into .css and saves the compiled .css file in our css/ directory
gulp.task('sass', function() {
    return gulp.src(publicDir + '/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest(publicDir + '/css'));
});

// Concatenate & Minify JS
// concatenates all JavaScript files in our js/ directory and saves the ouput to our dist/ directory.
// Then gulp takes that concatenated file, minifies it, renames it and saves it to the dist/ directory alongside the concatenated file
gulp.task('scripts', function() {
    return gulp.src(publicDir + '/js/*.js')
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest(publicDir + '/dist'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(publicDir + '/dist'));
});

// Watch Files For Changes
// used to run tasks as we make changes to our files
gulp.task('watch', function() {
    gulp.watch(publicDir + '/js/*.js', ['lint', 'scripts']);
    gulp.watch(publicDir + '/js/libs/*.js', ['main-bower-files']);
    gulp.watch(publicDir + '/scss/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['main-bower-files', 'lint', 'sass', 'scripts', 'watch']);