/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                // Tema Toy Story: biru langit dinding kamar Andy
                indigo: {
                    50:  '#EFF8FF',
                    100: '#DBEEFE',
                    200: '#BFE3FE',
                    300: '#93D1FD',
                    400: '#60B6FA',
                    500: '#3B98F5',
                    600: '#2478E6',
                    700: '#1D61CC',
                    800: '#1E4EA3',
                    900: '#1E4382',
                },
            },
        },
    },
    plugins: [],
};