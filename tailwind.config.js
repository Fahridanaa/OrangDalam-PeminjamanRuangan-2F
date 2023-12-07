/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./app/**/*.{html,php}'],
    theme: {
        extend: {
            colors: {
                'primary-color': 'var(--primary-color)',
                'secondary-color': 'var(--secondary-color)',
                'third-color': 'var(--third-color)',
                'fourth-color': 'var(--fourth-color)',
                'select-color': 'var(--select-color)',
                'warn-color': 'var(--warn-color)',
                'danger-color': 'var(--danger-color)',
                'text-color': 'var(--text-color)',
                'neutral-color': 'var(--neutral-color)',
                'disable-color': 'var(--disable-color)',
                'noFocus-color': 'var(--noFocus-color)',
            },
            fontFamily: {
                'jakarta': ['Plus Jakarta Sans', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
