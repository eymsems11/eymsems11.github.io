document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.querySelector(".form__input[type='submit']");

    registerButton.addEventListener("click", function (e) {
        e.preventDefault(); // Form submitini engelle

        // Kullanıcı bilgilerini al
        const email = document.querySelector("input[name='email']").value;
        const password = document.querySelector("input[name='password']").value;
        const username = document.querySelector("input[name='username']").value;
        const birthdate = document.querySelector("input[name='birthdate']").value;

        // Kullanıcı bilgilerini JSON formatına dönüştürme
        const userData = {
            email,
            password,
            username,
            birthdate
        };

        // Sunucuya POST isteği gönderme
        fetch('https://example.com/saveUserData', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(userData)
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Error while adding new user data!!!');
            }
        })
        .then(data => {
            // Sunucudan gelen cevaba göre işlem yapılabilir
            window.location.href = "profile.htm";
        })
        .catch(error => {
            console.error('Hata:', error);
            alert("Error while sending data!!!");
        });
    });
});
