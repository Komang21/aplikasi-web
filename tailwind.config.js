import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                glass: {
                    bg: 'rgba(255, 255, 255, 0.1)',
                    border: 'rgba(255, 255, 255, 0.2)',
                    'dark-bg': 'rgba(17, 24, 39, 0.4)',
                    'dark-border': 'rgba(255, 255, 255, 0.1)',
                }
            },
            backdropBlur: {
                glass: '20px',
            },
        },

    },

    plugins: [forms],
};
