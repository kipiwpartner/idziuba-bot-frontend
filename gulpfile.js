import gulp from "gulp"

import dartSass from 'sass'
import gulpSass from 'gulp-sass'
const sass = gulpSass(dartSass)

import watch from "gulp-watch"
import plumber from"gulp-plumber"
import notify from "gulp-notify"
import autoprefixer from "gulp-autoprefixer"
import cssmin from "gulp-cssmin"
import concat from "gulp-concat"
import webpack from "webpack-stream"
import TerserPlugin from "terser-webpack-plugin"
import run from 'gulp-run'

const paths = {
    styles: {
        name:'main.css',
        src_main: 'resources/styles/main.scss',
        src: 'resources/styles/**/*.scss',
        dest: 'public/assets/css'
    },
    scripts: {
        name:'main.bundle.js',
        src_main: 'resources/js/main.js',
        src: 'resources/js/**/*.js',
        dest: 'public/assets/js'
    },
    viewsPPH: {
        src_main: 'app/Views/templates/*.php',
        src: 'app/Views/**/*.php'
    }
};

//SASS
gulp.task('scss', function(){
    return gulp.src(paths.styles.src_main)
        .pipe(plumber ({
            errorHandle: notify.onError(function(err){
                return {
                    title: "Styles",
                    sound: false,
                    message: err.message
                }
            })
        }))
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(cssmin())
        .pipe(concat(paths.styles.name))
        .pipe(gulp.dest(paths.styles.dest))
})

gulp.task('tailwind', function() {
    return gulp
        .src(paths.viewsPPH.src_main)
        .pipe(run('npm run tailwind'))
});

//JS
gulp.task('js', function(){
    return gulp.src(paths.scripts.src_main)
        .pipe(webpack({
            mode: 'none',
            optimization: {
                minimize: true,
                minimizer: [
                    new TerserPlugin({
                        test: /\.js(\?.*)?$/i,
                    }),
                ],
            }
        }))
        .pipe(plumber ({
            errorHandle: notify.onError(function(err){
                return {
                    title: "JavaScript",
                    sound: false,
                    message: err.message
                }
            })
        }))
        .pipe(concat(paths.scripts.name))
        .pipe(gulp.dest(paths.scripts.dest))
})

gulp.task('watch', function(){
    watch(paths.styles.src, gulp.parallel('scss'))
    watch(paths.scripts.src, gulp.parallel('js'))
    watch(paths.viewsPPH.src, gulp.parallel('tailwind'))
})
gulp.task('default', gulp.parallel('scss', 'js', 'tailwind', 'watch'))
gulp.task('build', gulp.parallel('scss', 'js', 'tailwind'))