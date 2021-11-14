module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  variants: {
      extends:{
          opacity:[ 'disabled' ],
      },
  },
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
