/*
Important gulp Commands:
npm init: Create Package.json
npm install --dev,
npm install --save-dev [package_name]
npm run gulp (For Mac OS)
---------------------------------------------------------------
Include the below folder If you want to source HTML Files
---------------------------------------------------------------

function html() {
  return src('client/templates/*.pug')
	.pipe(pug())
	.pipe(dest('build/html'))
}

//Use Below for Series
//watch('../project/src/css/*.css', series(clean, javascript));
*/

(function (r) {
   "use strict";

	const { watch, series, src, dest, parallel } = require('gulp');
	const pug = r('gulp-pug');
	const less = r('gulp-less');
	const minifyCSS = r('gulp-csso');
	const concat = r('gulp-concat');
	const uglify = r('gulp-uglify');

	function cssLess() {
	  return src('public_src/less/*.less')
		.pipe(less())
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
		//.pipe(concat('app.min.js'))
		.pipe(uglify())
		.pipe(dest('../public/assets/js', { sourcemaps: true }))
	}

	watch('../project/public_src/css/*.css',{ events: 'all' }, css);
	watch('../project/public_src/less/*.less',{ events: 'all' }, cssLess);
	watch('../project/public_src/js/*.js',{ events: 'all' }, js);

	exports.js = js;
	exports.css = css;
	//exports.html = html;
	exports.cssLess = cssLess;

	//Below function options (html, css, js)
	exports.default = parallel(css, cssLess, js);
}(require));
