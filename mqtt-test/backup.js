var nama = '';

  if(rf_id === '0x04 0x5d 0x25 0x8a 0xc6 0x61 0x80')
  {
    nama = 'Jajang'
    console.log('Selamat Menempuh Hidup Baru ' + nama + ' dengan RFID : ' + rf_id)
  }
  else if(rf_id === '0x44 0x04 0x56 0xd3')
  {
    nama = 'Nina'
    console.log('wilujeng sumping ' + nama + ' dengan RFID : ' + rf_id)
  }
  else if(rf_id === '0xb9 0x78 0xbf 0x6e')
  {
    nama = 'Santi'
    console.log('Ahlan wasahlan ' + nama + ' dengan RFID : ' + rf_id)
  }
  else if(rf_id === '0x7b 0xe3 0xae 0x22')
  {
    nama = 'Doyok'
    console.log('wilujeng sumping ' + nama + ' dengan RFID : ' + rf_id)
  }
  else if(rf_id === '0x99 0x2e 0xa5 0x15')
  {
    nama = 'Nanda Intan'
    console.log('ahlan wasahlan ' + nama)
  }
  else
  {
    console.log(rf_id + ' Tidak dikenal');
  }