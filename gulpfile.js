/**
 * @author Greenrivers
 * @copyright Copyright (c) 2023 Greenrivers
 */

const gulp = require('gulp');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');

// ES6 modules
const rollup = require('gulp-better-rollup');
const babel = require('rollup-plugin-babel');
const resolve = require('rollup-plugin-node-resolve');
const commonjs = require('rollup-plugin-commonjs');

const {src, dest, watch} = gulp;

const jsPath = './app/**/*.js';
const jsModulesPath = '!./app/modules/**/*.js';

const js_dest_dir = './assets/js';

const compileJS = () => {
    return src([jsPath, jsModulesPath])
        .pipe(rollup({ plugins: [babel(), resolve(), commonjs()] }, 'umd'))
        .pipe(sourcemaps.init())
        // .pipe(concat('script.js')) // into one
        .pipe(terser())
        .pipe(sourcemaps.write())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(dest(js_dest_dir));
}

const watchBuild = () => {
    return watch(jsPath, {interval: 1000}, compileJS);
}

const build = compileJS;

exports.watch = watchBuild;
exports.build = build;
exports.default = build;
