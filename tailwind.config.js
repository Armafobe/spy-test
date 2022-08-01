/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/**/*.php"],
  theme: {
    extend: {},
  },
  safelist: [
    'lg:w-2/5',
    'lg:w-1/2',
    'justify-evenly',
  ],
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require('@tailwindcss/forms'),
  ],
}
