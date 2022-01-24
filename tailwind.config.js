const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    variants: {
        extend: {
            // ...
            display: ['hover', 'focus', 'group-hover'],
        }
    },
    theme: {
        extend: {
            colors: {
                primary: '#62CEF9',
                secondary: '#4D4D4D',
                icon: '#8D8D8D',
                text: '#6A6B7A',
                'lighten-grey': '#F1F2F3',
                'purple-lighten': '#A28EEC',
                'purple-darken': '#585CE5',
                'purple-lighten-1': '#a28eec1a',
                'purple-lighten-2': '#a28eec26',
                'purple-lighten-3': '#a28eec40',
                'purple-lighten-4': '#a28eec59',
                'green-lighten': '#4AC989',
                'green-lighten-1': '#4ac98926',
                'red-lighten-1': '#ff707026',
                'cyan-lighten-1': '#62cef940',
                'yellow-lighten': 'rgba(236, 172, 74, 0.25)',
            },
            margin: {
                'n1': '-1px',
            },
            borderRadius: {
                'lg-2x': '1em'
            }
        },
        fontFamily: {
            'body': ['Inter']
        },
        fontSize: {
            'xs': '.0.63rem',
            'sm': '.473rem',
            'tiny': '.7225rem',
            'base': '0.85rem',
            'lg': '0.956rem',
            'xl': '1.06rem',
            '2xl': '1.275rem',
            '3xl': '1.593rem',
            '4xl': '1.91rem',
            '4-5xl': '2.125rem',
            '5xl': '2.55rem',
            '6xl': '3.4rem',
            '7xl': '4.25rem',
        }
    },

    plugins: [],
};
