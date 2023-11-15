document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.querySelector(".form__input[type='submit']");

    registerButton.addEventListener("click", function (e) {
        e.preventDefault(); // Form submitini engelle

        // Kullanıcı bilgilerini al
        const email = document.querySelector("input[name='email']").value;
        const password = document.querySelector("input[name='password']").value;
        const username = document.querySelector("input[name='username']").value;

        // Kullanıcı bilgilerini bir JavaScript nesnesi olarak oluştur
        const userData = {
            email,
            password,
            username
        };

        // Mevcut data.json dosyasına veri eklemek için bir AJAX veya fetch isteği gönderin
        fetch('buddies/data.json')
            .then(response => response.json())
            .then(existingData => {
                // Mevcut veriye yeni kullanıcı verisini ekleyin
                existingData.users.push(userData);

                // Yeni veriyi JSON formatına çevirin
                const updatedDataJSON = JSON.stringify(existingData);

                // data.json dosyasına güncellenmiş veriyi gönderin
                fetch('buddies/data.json', {
                    method: 'PUT', // Veya 'POST' olarak değiştirilebilir
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: updatedDataJSON
                })
                    .then(response => {
                        if (response.ok) {
                            alert("Yeni kullanıcı verisi başarıyla eklendi.");
                        } else {
                            alert("Yeni kullanıcı verisi eklenirken bir hata oluştu.");
                        }
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                        alert("Veri gönderilirken bir hata oluştu.");
                    });
            })
            .catch(error => {
                console.error('Hata:', error);
                alert("Veri alınırken bir hata oluştu.");
            });
    });
});