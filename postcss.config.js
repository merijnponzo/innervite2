//const purgecss = require('@fullhuman/postcss-purgecss')
/*
 purgecss({
      content: ['./src/*.vue'],
    }),
*/
module.exports = {
  plugins: [require('rfs')({ baseValue: 16 }), require('autoprefixer')],
}
