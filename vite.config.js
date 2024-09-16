import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import dotenv from 'dotenv';

dotenv.config(); // ennvironment variables

export default defineConfig({
	plugins: [vue()],
	server: {
		port: parseInt(process.env.VITE_PORT, 10) || 3000,
		strictPort: true,
	},
	build: {
		outDir: process.env.VITE_BUILD_DIR,
		emptyOutDir: true,
	},
	resolve: {
		alias: {
			'@': `/${process.env.VITE_RESOURCES_DIR}`,
		},
	},
});