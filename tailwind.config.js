/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./node_modules/@material-tailwind/html/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Work Sans"', 'sans-serif'],
                titulo: ['"Oxanium"', 'sans-serif'],
                texto: ['"Work Sans"', 'sans-serif'],

            },
            colors: {
               azul: '#1c1c6b',
               laranja: '#ff501a',
               preto: '#151516',
               branco:'#ededf2',
            },
        },
    },
    plugins: [
        // require('tw-elements/dist/plugin.cjs'),
    ],
}






// import defaultTheme from 'tailwindcss/defaultTheme';
// import forms from '@tailwindcss/forms';

// /** @type {import('tailwindcss').Config} */

// const withMT = require("@material-tailwind/html/utils/withMT");

// module.exports = withMT({
//   content: ["./index.html"],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// });

// module.exports = {
//   content: [
//     "./src/**/*.{html,js}",
//     "./node_modules/tw-elements/js/**/*.js"
//   ],
//   plugins: [require("tw-elements/plugin.cjs")],
//   darkMode: "class"
// };


// export default {
//   content: [
//     "./resources/**/*.blade.php",
//     "./resources/**/*.js",
//     "./node_modules/@material-tailwind/html/**/*.js",

//   ],
//   theme: {
//     extend: {
//       fontFamily: {
//           custom: ['"National Park"', 'sans-serif'],
//           custom: ['"Patua One"', 'serif'],
//     },
//       colors: {

//       },
//     },
//   },
//   plugins: [],
// }





// export default {
//     content: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Figtree', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [forms],
// };
