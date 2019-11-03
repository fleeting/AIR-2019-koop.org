var config = require('./gulp/config.json'),
  files = require('./gulp/files'),
  gulp = require('gulp'),
  fs = require('fs'),
  postcss = require('gulp-postcss'),
  sourcemaps = require('gulp-sourcemaps'),
  cssnano = require('cssnano'),
  atImport = require('postcss-import'),
  rename = require('gulp-rename'),
  jshint = require('gulp-jshint'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  sizereport = require('gulp-sizereport'),
  imagemin = require('gulp-imagemin'),
  babel = require('gulp-babel'),
  modernizr = require('modernizr');

var modernizr_config = require('./modernizr-config.json');

gulp.task('default', ['css', 'js', 'images']);

gulp.task('images', function () {
  return gulp.src(files.globs.images.src)
    .pipe(imagemin([
      imagemin.gifsicle({ interlaced: true }),
      imagemin.jpegtran({ progressive: true }),
      imagemin.optipng({ optimizationLevel: 7 }),
      imagemin.svgo({ plugins: [{ removeViewBox: true, cleanupIDs: false }] })
    ]))
    .pipe(gulp.dest(files.paths.images.dist));
});

gulp.task('css', [], function () {
  var processors = [
    atImport(),
    cssnano()
  ];

  return gulp.src(files.globs.css.src)
    .pipe(sourcemaps.init())
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(files.paths.css.dist))
    .pipe(sizereport());
});

gulp.task('lint-js', function () {
  return gulp.src(files.globs.js.src)
    .pipe(jshint(files.paths.js.jshint + files.globs.js.jshint))
    .pipe(jshint.reporter(config.jshint_reporter));
});

gulp.task('modernizr', function (done) {
  modernizr.build(modernizr_config, function (code) {
    fs.access('./js/vendor/', null, function (err) {
      if (err) {
        fs.mkdir('./js/vendor/', 0o755, function () {
          fs.writeFile('./js/vendor/modernizr-build.js', code, done);
        });
      } else {
        fs.writeFile('./js/vendor/modernizr-build.js', code, done);
      }
    });
  });
});

gulp.task('js', ['lint-js', 'modernizr'], function () {
  return gulp.src(files.globs.js.src)
    .pipe(sourcemaps.init())
    .pipe(babel())
    .pipe(concat(files.globs.js.dist.original))
    .pipe(gulp.dest(files.paths.js.dist))
    .pipe(rename(files.globs.js.dist.minified))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(files.paths.js.dist))
    .pipe(sizereport());
});
