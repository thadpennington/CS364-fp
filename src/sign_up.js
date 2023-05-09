async function sha256(str) {
    const buffer = new TextEncoder("utf-8").encode(str);
    const hash = await crypto.subtle.digest("SHA-256", buffer);
    return Array.from(new Uint8Array(hash))
        .map((b) => b.toString(16).padStart(2, "0"))
        .join("");
}

async function createHash(PS) {
    //window.location.replace("../src/log_in.html");
    const hash = await sha256(PS);
    return hash;
}

function checkPassword(){
    var PS = document.getElementById("password");
    var confirmPS = document.getElementById("confirmPassword");
    var eMSG = document.getElementById("error-message");

    if (PS.value === confirmPS.value){
        var email = document.getElementById("emailAddress");
        var username = document.getElementById("username");
        var hash = createHash(PS.value);

        $.ajax({
            url: "demo.php",
            method: "POST",
            data: {
                emailAddress: email.value,
                username: username.value,
                password: hash,
                sex: $('input[name=sex]:checked').val()
            },
            success: function(response) {
                // Handle the response from the server
                // For example, you can redirect to another page using:
                window.location.href = "success.html";
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.log(error);
            }
        });



        return false;
    }
    else {
        eMSG.style.display = "block";
        return false;
    }
}
