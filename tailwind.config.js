/** @type {import('tailwindcss').Config} */
// eslint-disable-next-line no-undef
module.exports = {
  darkMode: 'class',
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './node_modules/flowbite/**/*.js',
  ],
  theme: {
    extend: {},
    colors: {
      'sheet': {
        100: '#047634',
        200: '#036b2f',
        300: '#01170a',
      },
      'mango': '#fd5906',
      'onion': {
        100: '#890352',
        200: '#580389',
      },
      'pineapple': '#fcea4b',
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}