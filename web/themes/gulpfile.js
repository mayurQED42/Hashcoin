var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');

//task for compiled scss files to css.
gulp.task('default', defaultTask);
function defaultTask(done) {
  return gulp.src('custom/maicon/sass/styles.scss') 
    .pipe(sass())
    .pipe(gulp.dest('custom/maicon/css/'))
    .pipe(browserSync.reload({stream: true}));
}

//task for compraises image size.
gulp.task('images', function(){
  return gulp.src('custom/maicon/images/**/*.+(png|jpg|gif|svg|jpeg)')
  .pipe(imagemin())
  .pipe(gulp.dest('custom/maicon/myimages'))
});

//task for browser sync.
gulp.task('browserSync', function() {
  browserSync.init({
    open: 'external',
    hostname: 'localhost',
    port: 7777,
    proxy: 'http://localhost:8888/drupal/Hashcoin/web/'
  })
});

// watched tasks
gulp.task('watch', gulp.parallel('browserSync', function(done) {
  gulp.watch('custom/maicon/sass/header.scss', gulp.series('default'));
}));