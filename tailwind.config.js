const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            backgroundOpacity: {
                '5': '0.05',
                '10': '0.1',
                '15': '0.15',
                '20': '0.2',
                '95': '0.95',
            },
            colors: {
                primary: {
                    100: '#FFB419',
                    400: '#FFAB00',
                    700: '#B37800',
                },
                secundary: {
                    100: '#002D75',
                    400: '#001433',
                    700: '#000F28',
                },
                accent: {
                    100: '#FF5983',
                    400: '#FF0D49',
                    700: '#800625',
                },
            },
            left: {
                '-full': '-100%',
            },
            inset: {
                '-full': '-100%',
            },
            backgroundImage: theme => ({
                'hero-pattern': "url('/img/backgrounds/hero-pattern.png')",
                'dots-pattern': "url('/img/backgrounds/dots-pattern.png')",
            }),
            transitionDelay: {
                '0': '0ms',
                '2000': '2000ms',
                '3000': '3000ms',
                '4000': '4000ms',
                '5000': '5000ms',
            },
            opacity: {
                '90': '0.9',
                '95': '0.95',
            },
            outline: {
                zero: 'none !important',
            },
        },
        minHeight: {
            '0': '0',
            '1/4': '25%',
            '1/2': '50%',
            '3/4': '75%',
            'full': '100%',
            'vh': '100vh',
            'screen': 'calc(100vh - 336px)',

        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    corePlugins: {
        container: false,
    },

    plugins: [require('@tailwindcss/ui')],
};