/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'header': "url('./public/images/header.jpg')",
      },
      backgroundColor: theme => ({
        ...theme('colors'),
        'primary': '#3F9AFA',
        'secondary': '#3C8BFE',
        'terciary': '#3D6E92'
      }),
      textColor: {
        'primary': '#3F9AFA',
        'secondary': '#3C8BFE',
        'terciary': '#3D6E92'
      },
      borderColor: {
        'primary': '#3F9AFA',
        'secondary': '#3C8BFE',
        'terciary': '#3D6E92'
      },
      ringColor: {
        'primary': '#3F9AFA',
        'secondary': '#3C8BFE',
        'terciary': '#3D6E92'
      },
      fontFamily: {
        'montserrat': ['Montserrat', 'sans-serif']
      }
    },
  },
  variants: {
    width: ["responsive", "hover", "focus"],
    extend:{},
  },
  plugins: [],
}

