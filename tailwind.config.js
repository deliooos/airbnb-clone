/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    fontFamily: {
      main: 'Heebo, sans-serif',
      title: 'Abril Fatface, cursive',
    },
    extend: {
      colors: {
        main: {
          600: '#f62e55',
          500: '#FF4466',
          400: '#FF5C7F',
        }
      }
    },
  },
  plugins: [],
}
