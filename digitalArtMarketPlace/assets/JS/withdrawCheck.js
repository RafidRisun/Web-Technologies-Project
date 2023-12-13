function withdrawCheck() {
    let amount = document.getElementById('amount').value;
    let Password = document.getElementById('password').value;

    if (amount === '') {
        alert("Please enter the amount to be Withdrawn");
        return;
    } else if (Password === '') {
        alert("Please enter your password");
    } else if (!Number.isInteger(parseInt(amount))) {
        alert("Please enter a valid amount in numbers");
    } else {
        function ajax() {
            let xhttp = new XMLHttpRequest();

            let info = {
                'amount': amount,
                'Password': Password
            }

            let data = JSON.stringify(info);
            // asynchronous
            xhttp.open('POST', '../controller/withdrawCheck.php', true);
            
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('result').innerHTML = this.responseText;
                }
            }
            xhttp.send('info=' + data);
        }
        ajax();
    }
}
