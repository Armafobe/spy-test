/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{php,js}"],
  theme: {
    extend: {
      transitionProperty: {
        'height': 'height',
        'padding': 'padding'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
