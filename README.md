#Round Trip
1) docker-compose up --build
2) docker exec -it php-fpm-rest bash
3) composer install
4) http://localhost:7000/round-trip
5) Можно отправить файл или строку в параметр data и указать опцыю для возращения ответа в формате (type по умолчанию xml|json)
<div><b>Route</b> Route::post('/round-trip', [RoundTripController::class, 'create']);</div>
<h3>В папке xml находится исходный xml роутов</h3>