/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        "primary": "#004ac6",
        "primary-container": "#2563eb",
        "on-primary": "#ffffff",
        "on-primary-container": "#eeefff",
        "tertiary": "#006242",
        "tertiary-container": "#007d55",
        "tertiary-fixed": "#6ffbbe",
        "surface": "#f8f9ff",
        "background": "#f8f9ff",
        "on-surface": "#0b1c30",
        "on-surface-variant": "#434655",
        "surface-container-lowest": "#ffffff",
        "surface-container-low": "#eff4ff",
        "surface-container": "#e5eeff",
        "surface-container-high": "#dce9ff",
        "outline": "#737686",
        "outline-variant": "#c3c6d7",
      },
      spacing: {
        "space-xs": "0.25rem",
        "space-sm": "0.5rem",
        "space-md": "1rem",
        "space-lg": "1.5rem",
        "space-xl": "2.5rem",
        "margin": "2rem",
      },
      fontFamily: {
        headline: ['"Plus Jakarta Sans"', 'sans-serif'],
        display: ['"Plus Jakarta Sans"', 'sans-serif'],
        body: ['Inter', 'sans-serif'],
        sans: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}