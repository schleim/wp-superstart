var gulp = require('gulp');
   concat = require('gulp-concat'),
   uglify = require('gulp-uglify'),
   imagemin = require('gulp-imagemin'),
   sourcemaps = require('gulp-sourcemaps'),
   sass = require('gulp-ruby-sass'),
   livereload = require('gulp-livereload'),
   prefix = require('gulp-autoprefixer'),
   modernizr = require('gulp-modernizr');

var browserSync = require('browser-sync');
var reload      = browserSync.reload;


var del = require('del');

// "localhost:8000" caused problems so we had to add "wordpress" to the hosts file
var localhost = "wordpress:8000";

var paths = {
  scripts: [
    'assets/js/*.js',
    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip.js',
    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/tranisiton.js',
    'bower_components/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown.js'
  ],
  sass: 'assets/sass/*.sass',
  images: 'assets/img/**/*'
};

// cleaning tasks
gulp.task('clean-scripts', function(cb) {
  del(['build/js'], cb);
});
gulp.task('clean-css', function(cb) {
  del(['build/css'], cb);
});
gulp.task('clean-images', function(cb) {
  del(['build/img'], cb);
});




//BrowserSync
gulp.task('browser-sync', function () {
    //declare files to watch
    //look for files in assets directory (from watch task)
    var files = [
    //only minified JS
    'build/js/*.js',
    //only minified CSS
    'build/css/*.css',
    //all images
    'build/img/*.{png,jpg,jpeg,gif,svg}',
    //all php files
    '**/*.php'
    ];

    //initialize browsersync
    browserSync.init(files, {
    //browsersync can't run PHP so we proxy external local server
      proxy: localhost
    });
});


// Minify and copy all JavaScript (except vendor scripts)
// with sourcemaps all the way down
gulp.task('scripts', ['clean-scripts'], function() {
  return gulp.src(paths.scripts)
    .pipe(sourcemaps.init())
      .pipe(uglify())
      .pipe(concat('all.min.js'))
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('build/js'));
});

// Compile SASS scripts
gulp.task('sass',['clean-css'], function () {
    gulp.src(paths.sass)
        .pipe(sass({sourcemap: true, style: 'compact'}))
        .pipe(prefix("last 1 version", "> 1%", "ie 8", "ie 7"))
        .pipe(gulp.dest('build/css'));
        // .pipe(reload({stream:true}));

});





// Copy all static images
gulp.task('images', ['clean-images'], function() {
  return gulp.src(paths.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5, svgoPlugins: [{removeViewBox: false}]}))
    .pipe(gulp.dest('build/img'));
});

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(paths.sass, ['sass']);
  gulp.watch(paths.scripts, ['scripts']);
  gulp.watch(paths.images, ['images']);
});




// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'scripts', 'images', 'sass','browser-sync']);
gulp.task('build', [ 'scripts', 'images', 'sass']);
