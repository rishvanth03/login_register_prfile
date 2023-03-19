function register() {
    var email = $('#email').val();
    var password = $('#password').val();


    $.ajax({
        url: 'php/register.php', // URL
        method: 'post',
        data: {
            email,
            password
        },
        dataType: 'json',
        success: function(result) {
            console.log(result);
            if (result.success === true) {
                alert(result.message);
                window.location.href = './profile.html';
            } else if (result.success === false) {
                alert(result.message);
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
}