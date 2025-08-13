/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './templates/**/*.php',
    './assets/js/src/**/*.js',
    './assets/css/src/**/*.scss',
  ],
  theme: {
    extend: {
      colors: {
        'trinity': {
          'primary': '#A31D1D', // Modern flat maroon - main brand color
          'primary-light': '#E5D0AC', // Warm accent for hover states and highlights
          'primary-dark': '#6D2323', // Deep maroon for emphasis and contrast
          'background': '#FEF9E1', // Warm cream background
          'secondary': '#2563eb',
          'accent': '#16a34a',
          'maroon': '#A31D1D', // Updated Trinity Health brand color (flat UI)
          'maroon-light': '#E5D0AC', // Light warm accent
          'maroon-dark': '#6D2323', // Dark maroon
          'gold': '#E5D0AC', // Updated gold to match new warm palette
          'gold-light': '#FEF9E1', // Light cream
          'gold-dark': '#D4B896', // Medium warm tone
        },
        'neutral': {
          50: '#fafafa',
          100: '#f5f5f5',
          200: '#e5e5e5',
          300: '#d4d4d4',
          400: '#a3a3a3',
          500: '#737373',
          600: '#525252',
          700: '#404040',
          800: '#262626',
          900: '#171717',
        }
      },
      fontFamily: {
        'sans': ['system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Open Sans', 'Helvetica Neue', 'sans-serif'],
        'serif': ['ui-serif', 'Georgia', 'Cambria', 'Times New Roman', 'Times', 'serif'],
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '100': '25rem',
        '112': '28rem',
        '128': '32rem',
      },
      maxWidth: {
        '8xl': '88rem',
        '9xl': '96rem',
      },
      animation: {
        'fade-in': 'fadeIn 0.5s ease-in-out',
        'slide-up': 'slideUp 0.6s ease-out',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { 
            transform: 'translateY(20px)', 
            opacity: '0' 
          },
          '100%': { 
            transform: 'translateY(0)', 
            opacity: '1' 
          },
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
}