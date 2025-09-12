import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueJsx from '@vitejs/plugin-vue-jsx'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/ts/app.ts'],
      refresh: true,
    }),
    vue(),
    vueJsx(),
  ],
  resolve: {
    alias: {
      '@': '/resources/ts',
    },
  },
})
