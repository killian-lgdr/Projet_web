import { registerRoute } from 'workbox-routing';
import {
  NetworkFirst,
  StaleWhileRevalidate,
  CacheFirst,
} from 'workbox-strategies';

import { CacheableResponsePlugin } from 'workbox-cacheable-response';
import { ExpirationPlugin } from 'workbox-expiration';

// Mise en cache des pages de navigation
registerRoute(
  
  ({ request }) => request.mode === 'navigate',
  
  new NetworkFirst({
    
    cacheName: 'pages',
    plugins: [
      
      new CacheableResponsePlugin({
        statuses: [200],
      }),
    ],
  }),
);

// Mise en caches du CSS, JS et web Worker
registerRoute(
  ({ request }) =>
    request.destination === 'style' ||
    request.destination === 'script' ||
    request.destination === 'worker',
  new StaleWhileRevalidate({
    cacheName: 'assets',
    plugins: [
      new CacheableResponsePlugin({
        statuses: [200],
      }),
    ],
  }),
);


// Mise en cache des images
registerRoute(
  ({ request }) => request.destination === 'image',
  new CacheFirst({
    cacheName: 'images',
    plugins: [
      new CacheableResponsePlugin({
        statuses: [200],
      }),
      new ExpirationPlugin({
        maxEntries: 2000, //2000 items max
        maxAgeSeconds: 60 * 60 * 24 * 30, // 30 jours
      }),
    ],
  }),
);


