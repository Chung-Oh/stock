const { dest, series, src, parallel } = require('gulp'); // Comandos internos Gulp
const gulpClean = require('gulp-clean'); // Remover diretórios e arquivos
const gulpImageMin = require('gulp-imagemin'); // Diminuir tamanho Imagens
const gulpConcat = require('gulp-concat'); // Concatenar CSS e JS
const gulpHtmlReplace = require('gulp-html-replace'); // Trocar links selecionados por 1 único link ou script
const gulpBabel = require('gulp-babel'); // Tranpilar códigos ES6 para ES5
const gulpUglify = require('gulp-uglify'); // Minifica JS
const gulpCssmin = require('gulp-cssmin'); // Minifica CSS
const browserSync = require('browser-sync'); // Autoreloading, olhar em tempo real comportamento: diretórios e arquivos
const gulpAutoprefixer = require('gulp-autoprefixer'); // Coloca prefixos de propriedades, onde navegadores não tem suporte
// Carregamento ao vivo
exports.server = function() {
	browserSync.init({
		server: {
			baseDir: 'localhost:8000'
		}
	});
}
// Usando 'glob pattern', coringas para ler tadas as pastas(**) e todos os arquivos(*)
function clean() {
	return src('dist')
		.pipe(gulpClean());
}

function copy() {
	return src('app/**/*')
		.pipe(dest('dist'));
}
// Faz merge no CSS login
function buildCssLogin() {
	return src(['dist/css/reset.css',
		'dist/css/login/login-base.css',
		'dist/css/login/login-title.css',
		'dist/css/login/login-alert.css',
		'dist/css/login/login-form.css',
		'dist/css/login/login-button.css'])
		.pipe(gulpAutoprefixer({
			browsers: ['last 40 versions'],
			cascade: false
		}))
		.pipe(gulpConcat('index.css'))
		.pipe(gulpCssmin())
		.pipe(dest('dist/css'));
}
// Faz merge em todos CSS do sistema
function buildCssSystem() {
	return src(['dist/css/reset.css',
		'dist/css/templates/base.css',
		'dist/css/templates/header.css',
		'dist/css/templates/msg-alert.css',
		'dist/css/modules/msg-home.css',
		'dist/css/modules/home-dash-top.css',
		'dist/css/modules/home-dash-body.css',
		'dist/css/modules/main-top.css',
		'dist/css/modules/search-box.css',
		'dist/css/modules/form-delete.css',
		'dist/css/modules/forms.css',
		'dist/css/modules/forms-product.css',
		'dist/css/modules/forms-category.css',
		'dist/css/modules/detail-info-head.css',
		'dist/css/modules/detail-button-panel.css',
		'dist/css/modules/detail-info-body.css',
		'dist/css/modules/table.css',
		'dist/css/modules/user-info.css',
		'dist/css/modules/user-button.css',
		'dist/css/modules/user-form.css',
		'dist/css/modules/msg-category-empty.css',
		'dist/css/templates/button-go-top.css',
		'dist/css/templates/footer.css'])
		.pipe(gulpAutoprefixer({
			browsers: ['last 40 versions'],
			cascade: false
		}))
		.pipe(gulpConcat('styles.css'))
		.pipe(gulpCssmin())
		.pipe(dest('dist/css'));
}
// Remove CSS concatenado
function removeCssNotUse(cb) {
	src(['dist/css/reset.css',
		'dist/css/login',
		'dist/css/modules',
		'dist/css/templates'])
		.pipe(gulpClean());
	cb();
}
// Setando Arquivo modificado do Index
function buildHtmlIndex(cb) {
	src('index.php')
		.pipe(gulpHtmlReplace({
			'css': {
				src: ['dist/css/index.css'],
				tpl: '<link rel="stylesheet" href="%s">'
			}
		}))
		.pipe(dest('dist'));
	cb();
}
// Setando Arquivo modificado do sistema
function buildHtmlSystem(cb) {
	src('dist/**/*.php')
		.pipe(gulpHtmlReplace({
			'css': {
				src: ['../css/styles.css'],
				tpl: '<link rel="stylesheet" href="%s">'
			},
			'js': {
				src: ['../js/all.js'],
				tpl: '<script type="module" src="%s"></script>'				
			}
		}))
		.pipe(dest('dist'));
	cb();
}
// Faz merge em todos JS
function buildJs() {
	return src(['dist/js/helpers/fade-elements.js',
		'dist/js/helpers/msg-empty.js',
		'dist/js/helpers/table-order.js',
		'dist/js/helpers/select.js',
		'dist/js/helpers/services.js',
		'dist/js/nav-bar-button.js',
		'dist/js/msg-session.js',
		'dist/js/search-box.js',
		'dist/js/table-listens.js',
		'dist/js/form-create.js',
		'dist/js/form-edit.js',
		'dist/js/form-delete.js',
		'dist/js/form-user.js',
		'dist/js/form-redefine.js',
		'dist/js/button-panel.js',
		'dist/js/footer-btn-top.js'])
		.pipe(gulpBabel({
			presets: ['@babel/env']
		}))
		.pipe(gulpConcat('all.js'))
		.pipe(gulpUglify())
		.pipe(dest('dist/js'));
}
// Removendo pasta ES6, todos arquivos concatenados no JS
function removeJsNotUse(cb) {
	src(['dist/es6',
		'dist/js/helpers',
		'dist/js/b*',
		'dist/js/f*',
		'dist/js/m*',
		'dist/js/n*',
		'dist/js/s*',
		'dist/js/t*'])
		.pipe(gulpClean());
	cb();
}
// Diminui tamanho das imagens
function buildImg(cb) {
	src('dist/img/**/*')
		.pipe(gulpImageMin())
		.pipe(dest('dist/img'));
	cb();
}
// Exemplo baixo usando uma Tarefa privada, são executadas sequencialmente "series()"
exports.default = series(clean, copy, buildCssLogin,
	parallel(buildCssSystem, buildHtmlIndex, buildHtmlSystem, buildJs, buildImg), 
	removeCssNotUse, removeJsNotUse);