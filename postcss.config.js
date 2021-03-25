const purgecss = require('@fullhuman/postcss-purgecss')
module.exports = {
  plugins: [
    require('rfs')({ baseValue: 16 }),
    require('autoprefixer'),
    purgecss({
      content: ['./src/*.vue'],
    }),
  ],
}
