/**
 * Tailwind CSS Configuration for McBest Solar
 * 
 * This configuration sets up Tailwind CSS with custom colors matching the brand,
 * dark mode support, and necessary plugins for forms and typography.
 * 
 * @see https://tailwindcss.com/docs/configuration
 */

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
    "./app/View/Components/**/*.php",
    "./vendor/filament/**/*.blade.php",
  ],
  
  // Enable dark mode with class strategy (toggle via JavaScript)
  darkMode: 'class',
  
  theme: {
    extend: {
      // Brand colors from the original design
      colors: {
        primary: {
          DEFAULT: '#27ae60',
          dark: '#219653',
          light: '#6fbf73',
        },
        secondary: {
          DEFAULT: '#2d9cdb',
          dark: '#2980b9',
          light: '#5dade2',
        },
        success: '#27ae60',
        error: '#e74c3c',
        warning: '#f39c12',
        whatsapp: '#25D366',
      },
      
      // Custom font family
      fontFamily: {
        sans: ['Outfit', 'system-ui', 'sans-serif'],
      },
      
      // Custom border radius
      borderRadius: {
        DEFAULT: '8px',
      },
      
      // Custom box shadows
      boxShadow: {
        'card': '0 5px 15px rgba(0, 0, 0, 0.05)',
        'card-hover': '0 10px 25px rgba(0, 0, 0, 0.1)',
        'dark-card': '0 5px 15px rgba(0, 0, 0, 0.2)',
        'dark-card-hover': '0 10px 25px rgba(0, 0, 0, 0.3)',
      },
      
      // Custom animations
      animation: {
        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
        'bounce-slow': 'bounce 2s infinite',
        'fade-in': 'fadeIn 0.3s ease-in',
        'slide-in': 'slideIn 0.3s ease-out',
      },
      
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideIn: {
          '0%': { transform: 'translateX(400px)' },
          '100%': { transform: 'translateX(0)' },
        },
      },
      
      // Custom spacing for consistent layout
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '128': '32rem',
      },
    },
  },
  
  plugins: [
    // Forms plugin for better form styling
    require('@tailwindcss/forms')({
      strategy: 'class', // Use class-based form styles
    }),
  ],
}
