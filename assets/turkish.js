var backgroundAudio = document.getElementById('backgroundAudio');

backgroundAudio.addEventListener('error', function() {
  console.error('Ses dosyası yüklenirken bir hata oluştu.');
});

backgroundAudio.play();
