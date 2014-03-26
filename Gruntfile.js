module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);


    var path   = require('path');
    var src    = path.resolve(__dirname, 'src');
    var assets = '/assets';
    var dest   = path.resolve(__dirname, 'public');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                stripBanners: {
                    line: true,
                    block: true,
                },
                banner: '/*!\n * <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %> \n' +
                ' * License: <%= pkg.license.type %> -  <%= pkg.license.url %>\n' +
                ' */\n\n',
                separator: ';\n',
            },
            dist: {
                src: src + assets + '/js/**/*.js',
                dest: dest + assets + '/js/app.js'
            },
        },
        sass: {
          dist: {
            src: src + assets + '/css/main.scss',
            dest: src + assets + '/css/main.css'
          }
        },
        copy: {
            root: {
                cwd: src,
                src: '*',
                dest: dest,
                expand: true,
                filter: 'isFile'
            },
            css: {
                cwd: src + assets + '/css',
                src: ['**', '!**/*.scss'],
                dest: dest + assets + '/css',
                expand: true
            },
            fonts: {
                cwd: src + assets + '/fonts',
                src: '**',
                dest: dest + assets + '/fonts',
                expand: true
            }
        },
        uglify: {
            options: {
                mangle: false,
                banner: '/*!\n * <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %> * \n' +
                ' * License: <%= pkg.license.type %> -  <%= pkg.license.url %>\n' +
                ' */\n\n',
            },
            dist: {
                src: dest + assets + '/js/app.js',
                dest: dest + assets + '/js/app.js'
            }
        },
        csso: {
          dist: {
            options: {
                banner: '/*!\n * <%= pkg.name %> - v<%= pkg.version %> - ' +
                '<%= grunt.template.today("yyyy-mm-dd") %> \n' +
                ' * License: <%= pkg.license.type %> -  <%= pkg.license.url %>\n' +
                ' */\n\n',
            },
            src: dest + assets + '/css/main.css',
            dest: dest + assets + '/css/main.css'
          }
        },
        php: {
            dev: {
                options: {
                    hostname: '127.0.0.1',
                    port: 3000,
                    keepalive: true,
                    base: 'public/'
                }
            }
        }
    });

    grunt.registerTask('default', ['concat', 'copy', 'uglify', 'sass', 'csso', 'php:dev']);
}
