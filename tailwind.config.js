/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    fontFamily: {
      'sans': ['"GT Walsheim Pro"', ...defaultTheme.fontFamily.sans],
      'mono': ['"Source Code Pro"', ...defaultTheme.fontFamily.mono],
    }
  },
  darkMode: 'class',
  plugins: [
    require('flowbite/plugin'),
    require('tailwindcss-plugins/pagination'),
    require('prettier-plugin-tailwindcss'),
  ],
}