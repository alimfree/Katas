var gulp = require('gulp'); 
var phpspec = require('gulp-phpspec'); 
var run = require('gulp-run'); 
var notify = require('gulp-notify'); 


gulp.task('test', function(){

	gulp.src('spec/**/*.php')
		.pipe(phpspec('', { 'verbose': 'v', clear: true, notify: true }))
		.on('error', notify.onError({
			title: 'Sorry', 
			message: 'Your tests failed, Ali!', 
			icon: __dirname + "/fail.png"
		}))

		.pipe(notify({
			title: 'Success', 
			message: 'All tests have retured green!', 
			icon: __dirname + "/success.jpg"
		})); 
});

gulp.task('watch', function() {
	gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']); 
}); 

gulp.task('default', ['test', 'watch']); 


