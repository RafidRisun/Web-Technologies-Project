
function topUpCheck() {
    let amount = document.getElementById('amount').value;
    let Password = document.getElementById('Password').value;
    

    if (amount === '') {
        alert("Please enter the amount to be deposited");
        return;
    } else if (Password === '') {
        alert("Please enter your password");
        return;
    } else if (!Number.isInteger(parseInt(amount))) {
        alert("Please enter a valid amount in numbers");
        return;
    } else {
        function ajax() {
            let xhttp = new XMLHttpRequest();
            
            let info = {
                'amount': amount,
                'Password': Password
            }
           
            let data = JSON.stringify(info);
        
            xhttp.open('POST', '../controller/TopUpCheck.php', true);
            
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
