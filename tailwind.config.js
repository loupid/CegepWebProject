module.exports = {
  purge: {
    enabled: 'true',
    mode: 'layers',
    content: ['./src/views/**/*.php','./src/views/**/**/*.php'],
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
    extend: {
      textOverflow: ['hover', 'focus'],
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
};
