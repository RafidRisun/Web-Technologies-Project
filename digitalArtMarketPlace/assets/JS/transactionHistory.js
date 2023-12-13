function transactionHistory(){  
    
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/transactionHistoryCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText);
            let history = JSON.parse(this.responseText);
            console.log(history);

            let infoDiv = document.getElementById('result');
            infoDiv.innerHTML = ``;

            let table = document.createElement('table');
            table.setAttribute("id", "table");
            table.style.border = '1px solid black';
            table.style.width = '30%';
            infoDiv.appendChild(table);

            let headerRow = ["Type", "Amount"];
            for (let i = 0; i < headerRow.length; i++) {
                let headerCell = document.createElement('th');
                headerCell.textContent = headerRow[i];
                document.getElementById('table').appendChild(headerCell);
            }


            history.forEach(history => {
                let tr = document.createElement('tr');
                tr.innerHTML = `<tr>
                    <td>
                        ${history.Type}
                    </td>
                    <td>
                        ${history.Amount}
                    </td>
                 
                </tr>`

                document.getElementById('table').appendChild(tr);

            });

        }
    }
    xhttp.send();  // No need to send any data
}
