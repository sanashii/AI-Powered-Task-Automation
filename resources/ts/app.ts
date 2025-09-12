import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h, DefineComponent } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/src/js';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

async function resolvePage(name: string) {
  const page = await resolvePageComponent(
    `./Pages/${name}.vue`,
    import.meta.glob('./Pages/**/*.vue')
  );
  return page as DefineComponent; // tells TS this is now a component
}


createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: resolvePage,
  setup({ el, App, props, plugin }) {
      const app = createApp({ render: () => h(App, props) });
      app.use(plugin);
      app.use(ZiggyVue);
      app.mount(el);
      return app;
  },
  progress: {
      color: '#4B5563',
  },
});


