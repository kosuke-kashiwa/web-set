module.exports = {
    startPath: null,
    proxy: 'http://grossyui.local/',
    files: ['**/*.html', '**/*.php', '**/*.js', '**/*.scss'],
    watchOptions: {
      ignoreInitial: true,
      ignored: 'node_modules'
    },
    ghostMode: true, //他のデバイスにミラーリングさせる
    notify: false
  };