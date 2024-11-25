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
				'primary': {
					DEFAULT: '#343a40', // dark grey
					600: '#595c61',
					300: '#d6d3d1',
					100: '#E6E3E3',
					50: '#f2f2f2', // light grey
				},
				'accent': {
					DEFAULT: '#c1e1ec', // blue
					600: '#add8e6', // darker blue
				},
				'info': {
					DEFAULT: '#efdaf9', // purple
					600: '#e5c4f5', // darker purple
				},
				'success': {
					DEFAULT: '#aee5c9', // green
					600: '#9bdfbc', // darker green
				},
				'danger': {
					DEFAULT: '#f7a1a1', // red
					600: '#f58a8a', // darker red
				},
				'warning': {
					DEFAULT: '#ffc683', // orange
					600: '#ffba6a', // darker orange
				},
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
