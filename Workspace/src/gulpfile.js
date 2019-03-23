var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var sourcemaps = require('gulp-sourcemaps');


// sass 編譯函式
gulp.task('sass', function () {
    return gulp.src('./sass/*.scss') // 來源目錄
        .pipe(sourcemaps.init())  //引入gulp-sourcemaps，要在sass編譯前
        .pipe(sass().on('error', sass.logError)) //經由sass 轉譯
        .pipe(sourcemaps.write()) //寫入gulp-sourcemaps位址
        .pipe(gulp.dest('./css')); //目的地目錄
});



gulp.task('default', ['sass'], function () {
    browserSync.init({
        server: {
            //根目錄
            baseDir: "./",
            index: "index.html"
        }
    });

    gulp.watch(["css/*.css", "css/**/*.css"], ['sass']).on('change', reload);
    gulp.watch(["sass/*.scss", "sass/**/*.scss"], ['sass']).on('change', reload); //監聽sass資料夾及sass下一層資料夾的scss檔
    gulp.watch("*.html").on('change', reload);
    gulp.watch("js/*.js").on('change', reload);
    gulp.watch("images/*").on('change', reload);
    // gulp.watch("images/*").on('change', reload);
});
