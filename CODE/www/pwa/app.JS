if ("serviceWorker" in navigator) {
    navigator.serviceWorker
        .register("./sw.JS")
        .then(serviceWorker => {
            console.log("Service Worker registered: ", serviceWorker);
        })
        .catch(error => {
            console.error("Error registering the Service Worker: ", error);
        });
}