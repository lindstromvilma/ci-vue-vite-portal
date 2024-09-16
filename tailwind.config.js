const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		'./app/Views/**/*.php',
		'./resources/js/**/*.vue',
		'./node_modules/vue-tailwind-datepicker/**/*.js'
	],
	theme: {
		extend: {
			colors: {
				black: '#19171B',
				white: '#FFF',
				'vtd-primary': colors.blue,
				'vtd-secondary': colors.gray,
			},
			fontFamily: {},
			fontSize: {},
			screens: {
				sm: '480px', // => @media (min-width: 480px) { ... }
				md: '768px', // => @media (min-width: 768px) { ... }
				lg: '1024px', // => @media (min-width: 1024px) { ... }
				xl: '1280px', // => @media (min-width: 1280px) { ... }
			},
		},
	},
	plugins: [
		plugin(({ addVariant }) => {
			// add variants here
		})
	],
}
