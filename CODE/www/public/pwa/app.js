if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/sw.JS') //Appelle du serviceWorker.js
    .then( (sw) => console.log('Le Service Worker a été pris en charge', sw)) // si le SW s'est bien exécuté cela affichera ceci.
    .catch((err) => console.log('Le Service Worker est introuvable', err)); // sinon il affichera ceci.
}