(function (r) {
   "use strict";

	const { watch, series, src, dest, parallel } = require('gulp');
	const pug = r('gulp-pug');
	const less = r('gulp-less');
	const sass = r('gulp-sass');
	const scss = r('gulp-scss');
	const minifyCSS = r('gulp-csso');
	const concat = r('gulp-concat');
	const uglify = r('gulp-uglify');

  sass.compiler = r('node-sass');

	function cssLess() {
	  return src('public_src/less/*.less')
		.pipe(less())
		.pipe(minifyCSS())
		.pipe(dest('../public/assets/css'))
	}

  function cssSass() {
	  return src('public_src/scss/*.scss')
	  .pipe(concat('styles.min.css'))
		.pipe(sass().on('error', sass.logError))
		.pipe(minifyCSS())
		.pipe(dest('../public/assets/css'))
	}

  function cssScss() {
	  return src('public_src/sass/*.sass')
  	.pipe(concat('styles.min.css'))
		.pipe(sass().on('error', sass.logError))
		.pipe(minifyCSS())
		.pipe(dest('../public/assets/css'))
	}

	function css() {
	  return src('public_src/css/*.css')
	  	.pipe(concat('styles.min.css'))
  		.pipe(minifyCSS())
  		.pipe(dest('../public/assets/css'))
	}

	function js() {
	  return src('public_src/js/*.js', { sourcemaps: true })
		.pipe(concat('app.min.js'))
		.pipe(uglify())
		.pipe(dest('../public/assets/js', { sourcemaps: true }))
	}

	watch('public_src/css/**/*.css',{ events: 'all' }, css);
	watch('public_src/less/**/*.less',{ events: 'all' }, cssLess);
	watch('public_src/sass/**/*.sass',{ events: 'all' }, cssSass);
	watch('public_src/scss/**/*.scss',{ events: 'all' }, cssSass);
	watch('public_src/js/**/*.js',{ events: 'all' }, js);

	exports.js = js;
	exports.css = css;
	//exports.html = html;
	exports.cssLess = cssLess;
	exports.cssSass = cssSass;
	exports.cssScss = cssScss;

	//Below function options (html, css, js)
	exports.default = parallel(css, cssLess, cssSass, cssScss, js);
}(require));
