#Round Trip
1) docker-compose up --build
2) http://localhost:7000/round-trip
3) Можно отправить файл или строку в параметр data и указать опцыю для возращения ответа в формате (type по умолчанию xml|json)
<div><b>Route</b> Route::post('/round-trip', [RoundTripController::class, 'create']);</div>
<h3>В папке xml находится исходный xml роутов</h3>