
var gulp         = require('gulp');
var less         = require('gulp-less');
var watch        = require('gulp-watch');
var notify       = require('gulp-notify');
var rename       = require("gulp-rename");
var plumber      = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');


var paths = {
	less : ['webroot/less/*.less'],
	bootstrap : ['webroot/bootstrap/*.less']
};

gulp.task('less', function() {
	return gulp.src('webroot/less/lightgrid.less')
		.pipe(plumber({
			errorHandler: function (err) {
				notify(err);
				this.emit('end');
			}
		}))
		.pipe(less())
		.pipe(autoprefixer({
			browsers: ['last 4 versions']
		}))
		.pipe(rename(function (path) {
			path.basename = "lightgrid";
			path.extname = ".css"
		}))
		.pipe(gulp.dest('webroot/css'))
		.pipe(notify('Compiled <%= file.relative %>'));
});

gulp.task('bootstrap', function() {
	return gulp.src('webroot/bootstrap/bootstrap.less')
		.pipe(plumber({
			errorHandler: function (err) {
				notify(err);
				this.emit('end');
			}
		}))
		.pipe(less())
		.pipe(autoprefixer({
			browsers: ['last 4 versions']
		}))
		.pipe(rename(function (path) {
			path.basename = "bstrap";
			path.extname = ".css"
		}))
		.pipe(gulp.dest('webroot/css'))
		.pipe(notify('Compiled <%= file.relative %>'));
});

gulp.task('watch', function() {
	gulp.watch(paths.less, ['less']);
	gulp.watch(paths.bootstrap, ['bootstrap']);
});

gulp.task('default', ['watch']);
