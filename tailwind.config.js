/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
    require('@tailwindcss/forms'),
  ],
}
