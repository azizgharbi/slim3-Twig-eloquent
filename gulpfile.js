var gulp = require('gulp');
var uglifycss = require('gulp-uglifycss');
var tinfier = require('gulp-tinifier');
var distFolder = "public/img/dist";
var imgToCompress = "public/img";
gulp.task('css', function() {
	gulp.src('public/assets/css/**/*.css').pipe(uglifycss({
		"maxLineLen": 80,
		"uglyComments": true
	})).pipe(gulp.dest('public/assets/dist/'));
});
gulp.task("tinypng", function(done) {
	gulp.src(imgToCompress).pipe(tinfier({
		key: 'soTyQxJniJBxy0Q-PkmYlQFRfhQ93gPI',
		verbose: true
	})).pipe(gulp.dest("sprites-optimized", {
		cwd: distFolder
	}))
});
gulp.task('default', ['css', "tinypng"]);
