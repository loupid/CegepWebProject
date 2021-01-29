module.exports = {
  purge: {
    mode: 'layers',
    content: ['./public/**/*.html'],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        cwc: {
          white: "#f5f5f5",
          red: "#b70739",
          blue: "#49aade",
          gray: "#222222",
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
