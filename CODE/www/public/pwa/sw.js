

//Dans ces deux variables on stock le nom de notre cache + l'assets qui contient les fichiers à garder en cache.
const NomDuCache= 'ma_sauvegarde';
const assets = [
    '/',
    '/index.php',
    '/about.php',
    '/contact.php',
    '/manifest.json',
    '/js/app.js',
    '/js/interface.js',
    '/css/styles.css',
    '/img/icon.png',
    '/img/icon72x72.jpg',
    '/img/icon96x96.jpg',
    '/img/icon128x128.jpg',
    '/img/icon144x144.jpg',
    '/img/icon152x152.jpg',
    '/img/icon192x192.jpg',
    '/img/icon384x384.jpg',
    '/img/icon512x512.jpg',
    '/img/about.jpg',
    '/img/contact.jpg',
    '/img/ORIGINAL.jpg',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://fonts.gstatic.com/s/materialicons/v70/flUhRq6tzZclQEJ-Vdg-IuiaDsNcIhQ8tQ.woff2'
];


//Installation du service worker
self.addEventListener('install', evt => {

     evt.waitUntil(  caches.open(NomDuCache).then(cache => {
        console.log('caching shell assets');
        cache.addAll(assets);
        })
    )
  
});



//Activation du Service Worker
self.addEventListener('activate', evt => {
    console.log('service Worker has been activated');
});


//fetch event afin de répondre quand on est en mode hors ligne.
self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.open('ma_sauvegarde').then(function(cache) {
        return cache.match(event.request).then(function (response) {
          return response || fetch(event.request).then(function(response) {
            cache.put(event.request, response.clone());
            return response;
          });
        });
      })
    );
  });
