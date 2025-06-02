import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import textShadow from 'tailwindcss-textshadow';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#1D2A40',
                'secondary': '#FFD700',
            },
            textShadow: {
                'dark': '0 4px 10px #000',
                'xl': '6px 6px 12px rgba(0, 0, 0, 0.3)'
            },
        },
    },

    plugins: [forms, textShadow],
};