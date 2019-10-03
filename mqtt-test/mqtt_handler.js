var mqtt = require('mqtt');
var axios = require('axios');

var credentials = { host: '167.205.7.226', port: 1883, username: '/absensi:absensi', password: 'PPTIK@|PASSWORD' };

var api_url = 'http://simapp.id/api';

var client  = mqtt.connect(credentials)

client.on('connect', function () {
  client.subscribe('absensi/service')
  client.publish('absensi/service', '{"mac": "2c:f4:32:57:a9:c6", "rf_id": "0xb9 0x78 0xbf 0x6e"}')
})

client.on('message', function (topic, message) {

  // message is Buffer
  var res = message.toString();

  var json_data = stringToJson(res);

  var rf_id = removeLastSpace(json_data.rf_id);

  axios.post(api_url+'/rfid/scan', json_data)
  .then(function (res) {
    console.clear();
    console.log(res.data);
  })
  .catch(function (error) {
    console.log(error);
  });


})


function stringToJson(data)
{
  return JSON.parse(data);
}

function removeLastSpace(data)
{
  return data.toString().trimRight();
}
// New Code

// '{"mac": "2c:f4:32:57:a9:c6", "rf_id": "0x99 0x2e 0xa5"}'
