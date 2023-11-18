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

        // Kullanıcı bilgilerini JSON'dan XML'e dönüştürme fonksiyonu
        function convertJSONtoXML(userData) {
            let xmlString = '<user>';

            for (const [key, value] of Object.entries(userData)) {
                xmlString += `<${key}>${value}</${key}>`;
            }

            xmlString += '</user>';
            return xmlString;
        }

        // Dönüştürülmüş XML verisini gönderme
        const userDataXML = convertJSONtoXML(userData);

        fetch('buddies/data.xml', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/xml'
            },
            body: userDataXML
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "profile.htm";
            } else {
                alert("Error while adding new user data!!!");
            }
        })
        .catch(error => {
            console.error('Hata:', error);
            alert("Error while sending data!!!");
        });
    });
});