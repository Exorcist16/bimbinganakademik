// Files to cache
var cacheName = 'ft-uh-scheduler-sw-v1';
// var appShellFiles = [
// ];
// var gamesImages = [];
// for(var i=0; i<games.length; i++) {
//   gamesImages.push('data/img/'+games[i].slug+'.jpg');
// }
// var contentToCache = appShellFiles.concat(gamesImages);

// // Installing Service Worker
// self.addEventListener('install', function(e) {
//   console.log('[Service Worker] Install');
//   e.waitUntil(
//     caches.open(cacheName).then(function(cache) {
//       console.log('[Service Worker] Caching all: app shell and content');
//       return cache.addAll(contentToCache);
//     })
//   );
// });

// // Fetching content using Service Worker
// self.addEventListener('fetch', function(e) {
//   e.respondWith(
//     caches.match(e.request).then(function(r) {
//       console.log('[Service Worker] Fetching resource: '+e.request.url);
//       return r || fetch(e.request).then(function(response) {
//         return caches.open(cacheName).then(function(cache) {
//           console.log('[Service Worker] Caching new resource: ' + e.request.url);
//           cache.put(e.request, response.clone());
//           return response;
//         });
//       });
//     })
//   );
// });

self.addEventListener('push', function (event) {
	var body;
	if (event.data) {
		body = event.data.text();
	} else {
		body = 'Push message no payload';
	}
	var options = {
		body: body,
		icon: 'img/notification.png',
		vibrate: [100, 50, 100],
		data: {
			dateOfArrival: Date.now(),
			primaryKey: 1
		}
	};
	event.waitUntil(
		self.registration.showNotification('Push Notification', options)
	);
});

self.addEventListener('notificationclick', function (event) {
	if (!event.action) {
		event.notification.close();
		clients.openWindow('https://localhost/testing/ft-uh-scheduler/Auth');
	}
});