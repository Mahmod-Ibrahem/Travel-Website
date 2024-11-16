import { transform } from '@vue/compiler-core';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily:{
            Logo:['Great Vibes','cursive']
        },
        maxWidth:{
            'custom':'87rem'
          },
        boxShadow: {
            'PouplarD': '0 35px 60px 0px rgba(0, 0, 0, 0.02)',
            '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
        },
        colors:{
            Special:'rgb(63,63,63)'
        },
        keyframes:{
            fade: {
                '0%, 100%': { opacity: 0.8 }, // Start and end opacity
                to: { opacity: 1 } // Final opacity
              },
            ToUp:{
                'from': {transform:'TranslateY(50%)' ,opacity:0},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            ToDown:{
                'from': {transform:'TranslateY(-50%)' ,opacity:0},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            P_ToUp:{
                'from': {transform:'TranslateY(30%)' ,opacity:0.5},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            MenuToRight:{
                'from':{transform:'TranslateX(-100%)' , opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            CategoryToRight:{
                'from':{transform:'TranslateX(-30%)' , opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            CategoryToLeft:{
                'from':{transform:'TranslateX(30%)' , opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ToLeft:{
                'from':{ transform:'translateX(100%)' , opacity:0},
                'to':{ transform:'TranslateX(0),',opacity:1}
            },
            DestToRight:{
                'from':{transform:'translateX(-30%)',opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            DestToLeft:{
                'from':{transform:'translateX(30%)',opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ImageSTR:{
                'from':{transform:'TranslateX(-50%)',opacity:0.5},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ImageMTR:{
                'from':{transform:'TranslateX(0%)',opacity:0.5},
                'to':{transform:'TranslateX(50%)',opacity:1}
            },
              },
        animation:{
            fade: 'fade 0.5s ease-in',
            ToUp:'ToUp 1s linear',
            ToDown:'ToDown 1s  linear',
            P_ToUp:'P_ToUp 1s  linear',
            MenuToRight:'MenuToRight 0.3s  linear' ,
            CategoryToRight:'CategoryToRight 1s  linear',
            CategoryToLeft:'CategoryToLeft 1s  linear',
            ToLeft: 'ToLeft 0.3s  linear',
            DestToRight:'DestToRight 1s  linear',
            DestToLeft:'DestToLeft 1s  linear',
            ImageSTR:'ImageSTR 0.3s linear ',
            ImageMTR:'ImageMTR 0.3s linear',
        }
      },
    },
    plugins: [],
  }
