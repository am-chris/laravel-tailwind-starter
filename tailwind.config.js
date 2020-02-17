module.exports = {
  theme: {
    screens: {
      'xs': '0px',
      // => @media (min-width: 640px) { ... }

      'sm': '425px',
      // => @media (min-width: 425px) { ... }

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }
    }
  },
  variants: {
    borderRadius: ['responsive', 'hover', 'focus'],
  },
  plugins: []
}
