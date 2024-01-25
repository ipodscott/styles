const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');

// Task to compile main and acf_blocks SCSS into main.css
gulp.task('compile-main', function() {
    return gulp.src(['./scss/main.scss', './scss/acf_blocks.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('main.css'))
        .pipe(gulp.dest('./css'));
});

// Task to compile admin.scss into admin.css
gulp.task('compile-admin', function() {
    return gulp.src('./scss/admin.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

// Task to compile acf_blocks.scss into acf_blocks.css
gulp.task('compile-acf-blocks', function() {
    return gulp.src('./scss/acf_blocks.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});

// Watch task
gulp.task('watch', function() {
    gulp.watch(['./scss/main.scss', './scss/acf_blocks.scss'], 
gulp.series('compile-main'));
    gulp.watch('./scss/admin.scss', gulp.series('compile-admin'));
    gulp.watch('./scss/acf_blocks.scss', 
gulp.series('compile-acf-blocks'));
});

// Default task to run all compile tasks and watch task
gulp.task('default', gulp.parallel('compile-main', 'compile-admin', 
'compile-acf-blocks', 'watch'));

