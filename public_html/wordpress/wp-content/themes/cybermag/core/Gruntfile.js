module.exports = function(grunt) {

  grunt.initConfig({
    cssmin: {
      add_banner: {
        options: {
          //banner: '/* Theme Name: cybermag Author: Cyberspeclab Version: 2.0 Text Domain: cybermag */'
        },
        files: {
          'css/style.min.css': ['css/style.css', 'css/cybermag.css']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-cssmin');

  //grunt.registerTask('default', ['jshint', 'qunit', 'concat', 'uglify']);

}
