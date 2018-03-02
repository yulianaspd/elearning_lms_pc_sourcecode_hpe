#!node
var gulp = require('gulp');
var concat = require('gulp-concat');
var merge = require('gulp-merge');
var uglify = require('gulp-uglify');
var less = require('gulp-less');
var minifyCss = require('gulp-minify-css');
var css2js = require('gulp-css2js');
var rename = require('gulp-rename');
var wrap = require('gulp-wrap');
var header = require('gulp-header');
var pkg = require('./package.json');
var banner = [
	'/**',
	' * <%= pkg.title %> - <%= pkg.description %>',
	' * @version v<%= pkg.version %>',
	' * @license <%= pkg.license %>',
	' * @author <%= pkg.author %>',
	' */',
	'',
].join('\n');

gulp.task('build', function() {
	return merge(
		gulp.src('src/*.less')
			.pipe(less())
			.pipe(minifyCss())
			.pipe(rename({suffix:'.min'}))
			.pipe(gulp.dest('dist/'))
			.pipe(css2js()),
		gulp.src('src/*.js')
			.pipe(concat('player.js'))
			.pipe(wrap('(function(){\n<%=contents%>\n}).call({});'))
			.pipe(uglify())
			.pipe(header(banner, {pkg: pkg}))
			.pipe(rename({suffix:'.min'}))
			.pipe(gulp.dest('dist/'))
	).pipe(concat('player-with-css.js'))
		.pipe(uglify())
		.pipe(header(banner, {pkg: pkg}))
		.pipe(rename({suffix:'.min'}))
		.pipe(gulp.dest('dist/'))
	;
});

gulp.task('default', ['build']);
