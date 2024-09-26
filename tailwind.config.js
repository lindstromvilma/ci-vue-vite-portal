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
					DEFAULT: '#2563EB', // blue-600
					800: '#1E40AF',    // blue-800
					400: '#60A5FA', // blue-400
					300: '#93C5FD', // blue-300
					200: '#BFDBFE',   // blue-200
					100: '#DBEAFE', // blue-100
					50: '#EFF6FF', // blue-50
				},
				'secondary': {
					DEFAULT: '#D946EF', // fuchsia-500
					600: '#C026D3',   // fuchsia-600
					300: '#F0ABFC',   // fuchsia-300
					200: '#F5D0FE',   // fuchsia-200
				},
				'info': {
					DEFAULT: '#0EA5E9', // sky-500
					600: '#0284C7',   // sky-600
					400: '#38BDF8',   // sky-400
					300: '#7DD3FC',   // sky-300
					100: '#E0F2FE',   // sky-100
				},
				'danger': {
					DEFAULT: '#F43F5E', // rose-500
					600: '#E11D48',   // rose-600
					400: '#FB7185',   // rose-400
					300: '#FDA4AF',   // rose-300
					100: '#FFE4E6',   // rose-100
				},
				'success': {
					DEFAULT: '#10B981', // emerald-500
					600: '#059669',   // emerald-600
					400: '#34D399',   // emerald-400
					300: '#6EE7B7',   // emerald-300
					100: '#D1FAE5',   // emerald-100
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
