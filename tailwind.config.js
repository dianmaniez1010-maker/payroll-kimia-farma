/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'kf-navy': '#003B73',
        'kf-blue': '#0080FF',
        'kf-cyan': '#00A8CC',
        'kf-bg': '#F8FAFC',
      }
    },
  },
  plugins: [],
}